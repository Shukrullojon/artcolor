<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Basket;
use App\Models\Package;
use App\Models\Order;
use App\Models\UserRole;

class BotController extends Controller
{


    public function index(Request $request)
    {
        $group = -1001554634954;

        $update = json_decode(file_get_contents('php://input'));
        if(!empty($update->message)){
            $message = $update->message;

            $reply_to_message = "";
            if(!empty($message->reply_to_message->message_id)){
                $reply_to_message = $message->reply_to_message->message_id;
            }
            $cid='';
            if(!empty($message->chat->id))
                $cid = $message->chat->id;
            $cidtyp = '';
            if(!empty($message->chat->type))
                $cidtyp = $message->chat->type;
            $miid = '';
            if(!empty($message->message_id))
                $miid = $message->message_id;
            $name = '';
            if(!empty($message->chat->first_name))
                $name = $message->chat->first_name;

            $user_telegram = '';
            if(!empty($message->from->username))
                $user_telegram = $message->from->username;
            $fromid = "";
            if(!empty($message->from->id))
                $fromid = $message->from->id;

            $tx = '';
            if(!empty($message->text))
                $tx = $message->text;
            $longitude = '';
            if(!empty($message->location->longitude))
                $longitude = $message->location->longitude;
            $latitude = '';
            if(!empty($message->location->latitude))
                $latitude = $message->location->latitude;
            if(!empty($message->contact->phone_number))
                $phone = $message->contact->phone_number;
            if(!empty($message->document->file_id)){
                $doc = $message->document->file_id;
            }
        }

        if(!empty($update->callback_query)){
            $callback = $update->callback_query;
            if(!empty($callback->message->message_id))
                $mid = $callback->message->message_id; // message id, inline keyboard message
            if(!empty($callback->message->chat->id))
                $cid = $callback->message->chat->id; // $cid

            if(!empty($callback->data))
                $tx = $callback->data;

            if(!empty($update->callback_query->id))
                $cqid = $update->callback_query->id;
            if($callback->from->id)
                $cbid = $callback->from->id;
        }

        if(!empty($update->callback_query)){

            $exp = explode(" ",$tx);
            if($exp[0] == "tasdiqlash_operator"){

                $user = User::where('chat_id',$cbid)->first();
                $user_role = UserRole::where('user_id',$user->id)->where('role_id',3)->first();

                if(!empty($user_role)){
                    Package::where('id',$exp[1])->update([
                        'operator_id'=>$user->id,
                        'operator_date' => date("Y-m-d H:i:s"),
                        'message_id' => $mid,
                    ]);

                    $data = $this->package($exp[1],$exp[0]);

                    $this->bot('editMessageText',[
                        'chat_id' => $group,
                        'message_id' => $mid,
                        'text' => $data['text'],
                        'parse_mode' => 'html',
                        'reply_markup'=>$data['page'],
                    ]);
                }else{
                    $this->bot('answerCallbackQuery',[
                        'callback_query_id' => $cqid,
                        'text' => "Kechirasiz, siz operator emassiz.",
                        'show_alert' => true,
                    ]);
                }
            }
            if($exp[0] == "operator_tasdiq_2"){
                $user = User::where('chat_id',$cbid)->first();
                $user_role = UserRole::where('user_id',$user->id)->where('role_id',3)->first();

                if(!empty($user_role)){
                    $data = $this->package($exp[1],$exp[0]);
                    Package::where('id',$exp[1])->update([
                        'status'=>4,
                    ]);
                    $this->bot('editMessageText',[
                        'chat_id' => $group,
                        'message_id' => $mid,
                        'text' => $data['text'],
                        'parse_mode' => 'html',
                        'reply_markup'=>$data['page'],
                    ]);
                }else{
                    $this->bot('answerCallbackQuery',[
                        'callback_query_id' => $cqid,
                        'text' => "Kechirasiz, siz operator emassiz.",
                        'show_alert' => true,
                    ]);
                }
            }
            if($exp[0] == "omborchi_tasdiq"){
                $user = User::where('chat_id',$cbid)->first();
                $user_role = UserRole::where('user_id',$user->id)->where('role_id',4)->first();

                if(!empty($user_role)){
                    Package::where('id',$exp[1])->update([
                        'storage_id'=>$user->id,
                        'storage_date' => date("Y-m-d H:i:s"),
                        'status'=>5,
                    ]);
                    $data = $this->package($exp[1],$exp[0]);
                    $this->bot('editMessageText',[
                        'chat_id' => $group,
                        'message_id' => $mid,
                        'text' => $data['text'],
                        'parse_mode' => 'html',
                        'reply_markup'=>$data['page'],
                    ]);
                }else{
                    $this->bot('answerCallbackQuery',[
                        'callback_query_id' => $cqid,
                        'text' => "Kechirasiz, siz omborchi emassiz.",
                        'show_alert' => true,
                    ]);
                }
            }
            if($exp[0] == "yetqazuvchi_tasdiq"){
                $user = User::where('chat_id',$cbid)->first();
                $user_role = UserRole::where('user_id',$user->id)->where('role_id',5)->first();

                if(!empty($user_role)){
                    Package::where('id',$exp[1])->update([
                        'supplier_id'=>$user->id,
                        'supplier_date' => date("Y-m-d H:i:s"),
                        'status'=>6,
                    ]);
                    $data = $this->package($exp[1],$exp[0]);
                    $this->bot('editMessageText',[
                        'chat_id' => $group,
                        'message_id' => $mid,
                        'text' => $data['text'],
                        'parse_mode' => 'html',
                        'reply_markup'=>$data['page'],
                    ]);
                }else{
                    $this->bot('answerCallbackQuery',[
                        'callback_query_id' => $cqid,
                        'text' => "Kechirasiz, siz yetqazuvchi emassiz.",
                        'show_alert' => true,
                    ]);
                }
            }
            if($exp[0] == "yetqazuvchi_confirm"){
                $user = User::where('chat_id',$cbid)->first();
                $package = Package::where('id',$exp[1])->first();
                if($user->id == $package->supplier_id){
                    Package::where('id',$exp[1])->update([
                        'supplier_done_date' => date("Y-m-d H:i:s"),
                        'status'=>7,
                    ]);
                    $data = $this->package($exp[1],$exp[0]);
                    $this->bot('editMessageText',[
                        'chat_id' => $group,
                        'message_id' => $mid,
                        'text' => $data['text'],
                        'parse_mode' => 'html',
                    ]);
                }else{
                    $this->bot('answerCallbackQuery',[
                        'callback_query_id' => $cqid,
                        'text' => "Kechirasiz, buyurtmani shergingiz olgan.",
                        'show_alert' => true,
                    ]);
                }
            }
            if($exp[0] == "operator_bekor_qilish"){
                $user = User::where('chat_id',$cbid)->first();
                $package = Package::where('id',$exp[1])->first();
                Package::where('id',$exp[1])->update([
                    'die_id' => $user->id,
                    'die_date' => date("Y-m-d H:i:s"),
                    'die_person' => "Operator",
                ]);
                $data = $this->package($exp[1],$exp[0]);
                $this->bot('editMessageText',[
                    'chat_id' => $group,
                    'message_id' => $mid,
                    'text' => $data['text'],
                    'parse_mode' => 'html',
                ]);
            }
            if($exp[0] == "omborchi_bekor_qilish"){
                $user = User::where('chat_id',$cbid)->first();
                $package = Package::where('id',$exp[1])->first();
                Package::where('id',$exp[1])->update([
                    'die_id' => $user->id,
                    'die_date' => date("Y-m-d H:i:s"),
                    'die_person' => "Omborchi",
                ]);
                $data = $this->package($exp[1],$exp[0]);
                $this->bot('editMessageText',[
                    'chat_id' => $group,
                    'message_id' => $mid,
                    'text' => $data['text'],
                    'parse_mode' => 'html',
                ]);
            }
            if($exp[0] == "yetqazuvchi_bekor_qilish"){
                $user = User::where('chat_id',$cbid)->first();
                $package = Package::where('id',$exp[1])->first();
                Package::where('id',$exp[1])->update([
                    'die_id' => $user->id,
                    'die_date' => date("Y-m-d H:i:s"),
                    'die_person' => "Yetqazuvchi",
                ]);
                $data = $this->package($exp[1],$exp[0]);
                $this->bot('editMessageText',[
                    'chat_id' => $group,
                    'message_id' => $mid,
                    'text' => $data['text'],
                    'parse_mode' => 'html',
                ]);
            }
        }

        $back_uz = json_encode([
            'resize_keyboard' => true,
            'one_time_keyboard' => true,
            'keyboard' => [
                [['text' => "🔙 orqaga"],]
            ]
        ]);

        $back_social_uz = json_encode([
            'resize_keyboard' => true,
            'keyboard' => [
                [['text' => "🔙 orqaga"],]
            ]
        ]);

        $back_uzb = json_encode([
            'resize_keyboard' => true,
            'one_time_keyboard' => true,
            'keyboard' => [
                [['text' => "🔙 орқага"],]
            ]
        ]);

        $back_social_uzb = json_encode([
            'resize_keyboard' => true,
            'keyboard' => [
                [['text' => "🔙 орқага"],]
            ]
        ]);

        $back_ru = json_encode([
            'resize_keyboard' => true,
            'one_time_keyboard' => true,
            'keyboard' => [
                [['text' => "🔙 назад"],]
            ]
        ]);

        $back_social_ru = json_encode([
            'resize_keyboard' => true,
            'keyboard' => [
                [['text' => "🔙 назад"],]
            ]
        ]);

        $main_uz = json_encode([
            'resize_keyboard' => true,
            'keyboard' => [
                [['text' => "🛍 Buyurtma berish"],['text' => "📞 Biz bilan aloqa"],],
                [['text' => "⚙️ Sozlamalar"],],
            ]
        ]);

        $main_uzb = json_encode([
            'resize_keyboard' => true,
            'keyboard' => [
                [['text' => "🛍 Буюртма бериш"],['text' => "📞 Биз билан алоқа"],],
                [['text' => "⚙️ Созламалар"],],
            ]
        ]);

        $main_ru = json_encode([
            'resize_keyboard' => true,
            'keyboard' => [
                [['text' => "🛍 Новый заказ"],['text' => "📞 Связь с нами"],],
                [['text' => "⚙️ Настройки"],],
            ]
        ]);

        $order_uz = json_encode([
            'resize_keyboard' => true,
            'keyboard' => [
                [['text' => "🔙 orqaga"],['text' => "📥 savat"],],
            ]
        ]);

        $order_uzb = json_encode([
            'resize_keyboard' => true,
            'keyboard' => [
                [['text' => "🔙 орқага"],['text' => "📥 сават"],],
            ]
        ]);

        $order_ru = json_encode([
            'resize_keyboard' => true,
            'keyboard' => [
                [['text' => "🔙 назад"],['text' => "📥 корзина"],],
            ]
        ]);

        $official_uz = json_encode([
            'resize_keyboard' => true,
            'keyboard' => [
                [['text' => "✅ Rasmiylashtirish"],],
                [['text' => "🔄 Tozalash"],['text' => "🔙 orqaga"],],
            ]
        ]);

        $official_uzb = json_encode([
            'resize_keyboard' => true,
            'keyboard' => [
                [['text' => "✅ Расмийлаштириш"],],
                [['text' => "🔄 Тозалаш"],['text' => "🔙 орқага"],],
            ]
        ]);

        $official_ru = json_encode([
            'resize_keyboard' => true,
            'keyboard' => [
                [['text' => "✅ Бронирование"],],
                [['text' => "🔄 Очистит"],['text' => "🔙 назад"],],
            ]
        ]);

        $location_uz = json_encode([
            'resize_keyboard' => true,
            'one_time_keyboard' => true,
            'keyboard' => [
                [
                    ['text' => "Manzilni yuborish", 'request_location' => true]
                ],
                [
                    ['text' => "Bekor qilish"]
                ]
            ]
        ]);

        $location_uzb = json_encode([
            'resize_keyboard' => true,
            'one_time_keyboard' => true,
            'keyboard' => [
                [
                    ['text' => "Манзилни юбориш", 'request_location' => true]
                ],
                [
                    ['text' => "Бекор қилиш"]
                ]
            ]
        ]);

        $location_ru = json_encode([
            'resize_keyboard' => true,
            'one_time_keyboard' => true,
            'keyboard' => [
                [
                    ['text' => "Отправить адрес", 'request_location' => true]
                ],
                [
                    ['text' => "Отмена"]
                ]
            ]
        ]);


        $confirmation_uz = json_encode([
            'resize_keyboard' => true,
            'one_time_keyboard' => true,
            'keyboard' => [
                [
                    ['text' => "✅ Tasdiqlash",]
                ],
                [
                    ['text' => "❌ Bekor qilish"]
                ]
            ]
        ]);

        $confirmation_uzb = json_encode([
            'resize_keyboard' => true,
            'one_time_keyboard' => true,
            'keyboard' => [
                [
                    ['text' => "✅ Тасдиқлаш",]
                ],
                [
                    ['text' => "❌ Бекор қилиш"]
                ]
            ]
        ]);

        $confirmation_ru = json_encode([
            'resize_keyboard' => true,
            'one_time_keyboard' => true,
            'keyboard' => [
                [
                    ['text' => "✅ Подтверждение",]
                ],
                [
                    ['text' => "❌ Отмена"]
                ]
            ]
        ]);

        $phone_send_uz = json_encode([
            'resize_keyboard' => true,
            'one_time_keyboard' => true,
            'keyboard' => [
                [[
                    'text' => "Raqamni jo'natish",
                    'request_contact'=> true
                ],],
            ]
        ]);

        $phone_send_uzb = json_encode([
            'resize_keyboard' => true,
            'one_time_keyboard' => true,
            'keyboard' => [
                [[
                    'text' => "Рақамни жўнатиш",
                    'request_contact'=> true
                ],],
            ]
        ]);

        $phone_send_ru = json_encode([
            'resize_keyboard' => true,
            'one_time_keyboard' => true,
            'keyboard' => [
                [[
                    'text' => "Отправить номер",
                    'request_contact'=> true
                ],],
            ]
        ]);

        $phone_code_uz = json_encode([
            'resize_keyboard' => true,
            'one_time_keyboard' => true,
            'keyboard' => [
                [['text' => "🔙 orqaga"],['text' => "Kodni qayta jo'natish"],],
            ]
        ]);

        $phone_code_uzb = json_encode([
            'resize_keyboard' => true,
            'one_time_keyboard' => true,
            'keyboard' => [
                [['text' => "🔙 орқага"],['text' => "Кодни қайта жўнатиш"],],
            ]
        ]);

        $phone_code_ru = json_encode([
            'resize_keyboard' => true,
            'one_time_keyboard' => true,
            'keyboard' => [
                [['text' => "🔙 назад"],['text' => "Отправить код еще раз"],],
            ]
        ]);

        $phone_code_change_uz = json_encode([
            'resize_keyboard' => true,
            'one_time_keyboard' => true,
            'keyboard' => [
                [['text' => "❌ Bekor qilish"],['text' => "Kodni qayta jo'natish"],],
            ]
        ]);

        $phone_code_change_uzb = json_encode([
            'resize_keyboard' => true,
            'one_time_keyboard' => true,
            'keyboard' => [
                [['text' => "❌ Бекор қилиш"],['text' => "Кодни қайта жўнатиш"],],
            ]
        ]);

        $phone_code_change_ru = json_encode([
            'resize_keyboard' => true,
            'one_time_keyboard' => true,
            'keyboard' => [
                [['text' => "❌ Отмена"],['text' => "Отправить код еще раз"],],
            ]
        ]);

        if($cid){
            $user = User::where('chat_id',$cid)->first();
            if(!empty($user)){
                $step = $user->step;
                $lang = $user->lang;
            }
        }

        if(empty($user) and $tx == "/start"){
            User::create([
                'name'=>$name,
                'username'=>$user_telegram,
                'chat_id'=>$cid,
                'step'=>1,
                'status'=>1,
            ]);
            $data = [];
            $data[] = [['text' => "O'zbekcha", 'callback_data' => "uz"],];
            $data[] = [['text' => "Ўзбекча", 'callback_data' => "uzb"],];
            $data[] = [['text' => "Руский язык", 'callback_data' => "ru"],];

            $page = array("inline_keyboard" => $data,);
            $page = json_encode($page,true);

            $this->bot('sendMessage',[
                'chat_id'=>$cid,
                'text'=>"Assalomu alaykum xizmat ko'rsatish tilini tanlang:\n__\nАссалому алайкум хизмат кўрсатиш тилини танланг:\n__\nЗдравствуйте, выберите язык обслуживания:",
                'parse_mode'=>'HTML',
                'reply_markup'=>$page
            ]);
        }

        if(!empty($user) and $step>=10 and $tx == "/start" ){
            User::where('id',$user->id)->update([
                'step'=>0,
            ]);
            $step=0;
            if($lang == 1){
                $this->bot('sendMessage',[
                    'chat_id'=>$cid,
                    'text'=>"Kerakli menyuni tanlang:",
                    'parse_mode'=>'HTML',
                    'reply_markup'=>$main_uz
                ]);
            }else if($lang == 2){
                $this->bot('sendMessage',[
                    'chat_id'=>$cid,
                    'text'=>"Керакли менюни танланг:",
                    'parse_mode'=>'HTML',
                    'reply_markup'=>$main_uzb
                ]);
            }else{
                $this->bot('sendMessage',[
                    'chat_id'=>$cid,
                    'text'=>"Выберите нужное меню:",
                    'parse_mode'=>'HTML',
                    'reply_markup'=>$main_ru
                ]);
            }
        }

        if($tx == "🛍 Buyurtma berish" or $tx == "🛍 Буюртма бериш" or $tx == "🛍 Новый заказ"){

            User::where('id',$user->id)->update([
                'step'=>10,
            ]);
            $products = Product::latest()->get();
            if($lang == 1){
                $this->bot('sendMessage',[
                    'chat_id'=>$cid,
                    'text'=>"Kerakli maxsulotlarni va sonini kiritib Savatni to‘ldirib buyurtma bering.",
                    'parse_mode'=>'HTML',
                    'reply_markup'=>$order_uz
                ]);
                foreach($products as $product){
                    $this->bot("sendPhoto",[
                        'chat_id' => $cid,
                        'photo' => "https://t.me/dataphotoocen/47",
                        'caption' => $product->name_uz."\n\n".base64_decode($product->content_uz)."\n\n"."Narxi:".number_format($product->price)." so'm",
                        'reply_markup' => json_encode([
                            'inline_keyboard' => [
                                [['text' => "-", 'callback_data' => "minus ".$product->id." 1"], ['text' => "1 ta", 'callback_data' => 'count 1'], ['text' => "+", 'callback_data' => "plus ".$product->id." 1"]],
                                [['text' => "🛒  Savatga qo'shish", 'callback_data' => 'savat '.$product->id." "."1"]],
                            ]
                        ])
                    ]);

                }
            }else if($lang == 2){
                $this->bot('sendMessage',[
                    'chat_id'=>$cid,
                    'text'=>"Керакли махсулотларни ва сонини киритиб Саватни то‘лдириб буюртма беринг.",
                    'parse_mode'=>'HTML',
                    'reply_markup'=>$order_uzb
                ]);
                foreach($products as $product){
                    $this->bot("sendPhoto",[
                        'chat_id' => $cid,
                        'photo' => "https://t.me/dataphotoocen/47",
                        'caption' => $product->name_en."\n\n".base64_decode($product->content_en)."\n\n"."Нархи:".number_format($product->price)." сўм",
                        'reply_markup' => json_encode([
                            'inline_keyboard' => [
                                [['text' => "-", 'callback_data' => "minus ".$product->id." 1"], ['text' => "1 та", 'callback_data' => 'count 1'], ['text' => "+", 'callback_data' => "plus ".$product->id." 1"]],
                                [['text' => "🛒  Саватга қўшиш", 'callback_data' => 'savat '.$product->id." 1"]],
                            ]
                        ])
                    ]);

                }
            }else{
                $this->bot('sendMessage',[
                    'chat_id'=>$cid,
                    'text'=>"Пожалуйста, заполните корзину и разместите заказ, указав необходимые продукты и их количество.",
                    'parse_mode'=>'HTML',
                    'reply_markup'=>$order_ru
                ]);
                foreach($products as $product){
                    $this->bot("sendPhoto",[
                        'chat_id' => $cid,
                        'photo' => "https://t.me/dataphotoocen/47",
                        'caption' => $product->name_ru."\n\n".base64_decode($product->content_ru)."\n\n"."Цена:".number_format($product->price)." сумма",
                        'reply_markup' => json_encode([
                            'inline_keyboard' => [
                                [['text' => "-", 'callback_data' => "minus ".$product->id." 1"], ['text' => "1 та", 'callback_data' => 'count 1'], ['text' => "+", 'callback_data' => "plus ".$product->id." 1"]],
                                [['text' => "🛒  Добавить в корзину", 'callback_data' => 'savat '.$product->id." 1"]],
                            ]
                        ])
                    ]);

                }
            }
        }

        if($step != 22 and ($tx == "📥 savat" or $tx == "📥 сават" or $tx == "📥 корзина" or $tx == "Bekor qilish" or $tx == "Бекор қилиш" or $tx == "Отмена" or $tx == "❌ Bekor qilish" or $tx == "❌ Отмена" or $tx == "❌ Бекор қилиш")){
            if($tx != "📥 savat" and $tx != "📥 сават" and $tx != "📥 корзина"){
                User::where('id',$user->id)->update([
                    'step'=>0,
                ]);
                $step=0;
            }else{
                User::where('id',$user->id)->update([
                    'step'=>10,
                ]);
            }
            $basket = Basket::where('user_id',$user->id)->get();
            if(count($basket)<1){
                if($lang==1){
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>"Savat bo'sh",
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$back_uz
                    ]);
                }else if($lang == 2){
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>"Сават бўш",
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$back_uzb
                    ]);
                }else{
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>"Корзина пуста",
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$back_ru
                    ]);
                }
            }else{
                if($lang == 1){
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>'"❌ Mahsulot nomi" - savatdan o\'chirish'."\n\n".' - va +" - mahsulot sonini kamaytirish yoki qo\'shish'."\n\n".'"🔄 Tozalash" - savatni butunlay bo\'shatish',
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$official_uz
                    ]);
                    $text = ""; $i = 1;
                    $total = 0;
                    $data = [];
                    foreach($basket as $b){
                        $product = Product::where('id',$b->product_id)->first();
                        $total +=  $b->count*$product->price;
                        $text .= $i.". ".$product->name_uz." = ".$b->count." x ".$product->price." = ".number_format($b->count*$product->price)." so'm\n";
                        $data[] = [['text' => "-", 'callback_data' => "minus_official ".$b->id],['text' => "❌  ".$i.". ".$product->name_uz, 'callback_data' => "delete_official ".$b->id],['text' => "+", 'callback_data' => "plus_official ".$b->id]];
                        $i++;
                    }
                    $text .= "\nUmumiy: ".number_format($total)." so'm";
                    $page = array("inline_keyboard" => $data,);
                    $page = json_encode($page,true);
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>$text,
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$page
                    ]);
                }else if($lang == 2){
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>'"❌  Маҳсулот номи" - саватдан ўчириш'."\n\n".' - ва +" - маҳсулот сонини камайтириш ёки қўшиш'."\n\n".'"🔄 Тозалаш" - саватни бутунлай бўшатиш',
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$official_uzb
                    ]);
                    $text = ""; $i = 1;
                    $total = 0;
                    $data = [];
                    foreach($basket as $b){
                        $product = Product::where('id',$b->product_id)->first();
                        $total +=  $b->count*$product->price;
                        $text .= $i.". ".$product->name_en." = ".$b->count." x ".$product->price." = ".number_format($b->count*$product->price)." сўм\n";
                        $data[] = [['text' => "-", 'callback_data' => "minus_official ".$b->id],['text' => "❌  ".$i.". ".$product->name_en, 'callback_data' => "delete_official ".$b->id],['text' => "+", 'callback_data' => "plus_official ".$b->id]];
                        $i++;
                    }
                    $text .= "\nУмумий: ".number_format($total)." сўм";
                    $page = array("inline_keyboard" => $data,);
                    $page = json_encode($page,true);
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>$text,
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$page
                    ]);
                }else{
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>'"❌  Наименование товара" - удалить из корзины'."\n\n".' - ва +" - уменьшить или добавить количество продуктов'."\n\n".'"🔄 Очистит" - полностью очистить корзину',
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$official_ru
                    ]);
                    $text = ""; $i = 1;
                    $total = 0;
                    $data = [];
                    foreach($basket as $b){
                        $product = Product::where('id',$b->product_id)->first();
                        $total +=  $b->count*$product->price;
                        $text .= $i.". ".$product->name_ru." = ".$b->count." x ".$product->price." = ".number_format($b->count*$product->price)." сумма\n";
                        $data[] = [['text' => "-", 'callback_data' => "minus_official ".$b->id],['text' => "❌  ".$i.". ".$product->name_ru, 'callback_data' => "delete_official ".$b->id],['text' => "+", 'callback_data' => "plus_official ".$b->id]];
                        $i++;
                    }
                    $text .= "\nОбщий: ".number_format($total)." сумма";
                    $page = array("inline_keyboard" => $data,);
                    $page = json_encode($page,true);
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>$text,
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$page
                    ]);
                }
            }
        }

        if($tx == "🔄 Tozalash" or $tx == "🔄 Тозалаш" or $tx == "🔄 Очистит"){
            $basket = Basket::where('user_id',$user->id)->delete();
            User::where('id',$user->id)->update([
                'step'=>0,
            ]);
            if($lang == 1){
                $this->bot('sendMessage',[
                    'chat_id'=>$cid,
                    'text'=>"Kerakli menyuni tanlang:",
                    'parse_mode'=>'HTML',
                    'reply_markup'=>$main_uz
                ]);
            }else if($lang == 2){
                $this->bot('sendMessage',[
                    'chat_id'=>$cid,
                    'text'=>"Керакли менюни танланг:",
                    'parse_mode'=>'HTML',
                    'reply_markup'=>$main_uzb
                ]);
            }else{
                $this->bot('sendMessage',[
                    'chat_id'=>$cid,
                    'text'=>"Выберите нужное меню:",
                    'parse_mode'=>'HTML',
                    'reply_markup'=>$main_ru
                ]);
            }
        }

        if($tx == "✅ Rasmiylashtirish" or $tx == "✅ Расмийлаштириш" or $tx == "✅ Бронирование"){
            User::where('id',$user->id)->update([
                'step'=>11,
            ]);
            if($lang == 1){
                $this->bot('sendMessage',[
                    'chat_id'=>$cid,
                    'text'=>"📍 Pastdagi tugmani bosib geolokatsiya yuboring yoki aniq manzilni yozib jo'nating.",
                    'parse_mode'=>'HTML',
                    'reply_markup'=>$location_uz
                ]);
            }else if($lang == 2){
                $this->bot('sendMessage',[
                    'chat_id'=>$cid,
                    'text'=>"📍 Пастдаги тугмани босиб геолокация юборинг ёки аниқ манзилни ёзиб жўнатинг.",
                    'parse_mode'=>'HTML',
                    'reply_markup'=>$location_uzb
                ]);
            }else{
                $this->bot('sendMessage',[
                    'chat_id'=>$cid,
                    'text'=>"📍 Отправьте геолокацию, нажав кнопку ниже, или отправьте, введя точный адрес.",
                    'parse_mode'=>'HTML',
                    'reply_markup'=>$location_ru
                ]);
            }
        }

        if($tx == "✅ Tasdiqlash" or $tx == "✅ Тасдиқлаш" or $tx == "✅ Подтверждение"){
            User::where('id',$user->id)->update([
                'step'=>0,
            ]);
            $step=0;
            $package = Package::where('user_id',$user->id)->where('status',0)->latest()->first();
            $baskets = Basket::where('user_id',$user->id)->get();
            foreach($baskets as $b){
                Order::create([
                    'package_id'=>$package->id,
                    'product_id'=>$b->product_id,
                    'count' => $b->count,
                ]);
            }
            $package->update([
                'status'=>3,
            ]);
            Basket::where('user_id',$user->id)->delete();

            $orders = Order::where('package_id',$package->id)->get();
            $text = "<b>Buyurtma raqami: </b>#".$package->id."\n";
            $text .= "<b>Maxsulotlar:</b>\n";
            $total = 0;
            $i=1;
            foreach($orders as $order){
                $product = Product::where('id',$order->product_id)->first();
                $text .= $i++.". ".$product->name_uz." ".$order->count." x ".$product->price." = ".number_format($product->price*$order->count)." so'm\n";
                $total += $product->price*$order->count;
            }
            $text .= "\n";
            $text .= "<b>Umumiy narx: </b>".number_format($total)." so'm\n";
            $text .= "<b>Telefon:</b> ".$user->phone."\n";
            $text .= "<b>Telegram:</b> <a href='tg://user?id=".$user->chat_id."'>".$user->name."</a> (@".$user->username.")\n";
            if($lang == 1){
                $text .= "<b>Til:</b> O'zbekcha\n";
            }else if($lang == 2){
                $text .= "<b>Til:</b> Ўзбекча\n";
            }else if($lang == 3){
                $text .= "<b>Til:</b> Руский язык\n";
            }
            $text .= "<b>Аgend ID:</b> ".$user->from_id."\n";
            $text .= "<b>Qayerdan kelgan:</b> ".$user->from."\n";
            $text .= "<b>Address:</b> ".$package->address."\n\n";
            $text .= "<b>Amallar:</b>";

            $data = [];
            $data[] = [['text' => "✅ Tasdiqlash", 'callback_data' => "tasdiqlash_operator ".$package->id],];
            $page = array("inline_keyboard" => $data,);
            $page = json_encode($page,true);

            $this->bot('sendMessage',[
                'chat_id'=>$group,
                'text'=>$text,
                'parse_mode'=>'HTML',
                'reply_markup' => $page,
            ]);

            if($lang == 1){
                $this->bot('sendMessage',[
                    'chat_id'=>$cid,
                    'text'=>"№".$package->id." raqamli buyurtmangiz qabul qilindi. Barcha tafsilotlar shu yerda berib boriladi.",
                    'parse_mode'=>'HTML',
                    'reply_markup'=>$main_uz
                ]);
            }else if($lang == 2){
                $this->bot('sendMessage',[
                    'chat_id'=>$cid,
                    'text'=>"№".$package->id." рақамли буюртмангиз қабул қилинди. Барча тафсилотлар шу ерда бериб борилади.",
                    'parse_mode'=>'HTML',
                    'reply_markup'=>$main_uzb
                ]);
            }else{
                $this->bot('sendMessage',[
                    'chat_id'=>$cid,
                    'text'=>"№".$package->id." ваш цифровой заказ принят. Все подробности приведены здесь.",
                    'parse_mode'=>'HTML',
                    'reply_markup'=>$main_ru
                ]);
            }
        }

        if($step == 11){
            if(!empty($longitude) and !empty($latitude)){
                $url = "https://nominatim.openstreetmap.org/reverse?format=json&lat={$latitude}&lon={$longitude}&zoom=18&addressdetails=1";
                $efe = curl_init();
                curl_setopt($efe, CURLOPT_URL, $url);
                curl_setopt($efe, CURLOPT_RETURNTRANSFER,true);
                curl_setopt($efe, CURLOPT_HEADER,false);
                curl_setopt($efe, CURLOPT_TIMEOUT, 60);
                curl_setopt($efe, CURLOPT_FOLLOWLOCATION, true);

                $headers = [];
                $headers[] = 'X-AppLang: eFeDe3';
                $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36';
                curl_setopt($efe, CURLOPT_HTTPHEADER, $headers);

                $suz = curl_exec($efe);
                curl_close($efe);
                $javob = json_decode($suz, true);
                $tx = $javob['display_name'];
            }
            $package=Package::create([
                'address'=>$tx,
                'user_id'=>$user->id,
                'status'=>0,
                'longitude'=>$longitude,
                'latitude'=>$latitude,
            ]);
            $basket = Basket::where('user_id',$user->id)->get();

            if($lang == 1){
                $text = "📍 Buyurtmani tasdiqlash\n\n";
                $text .= "Buyurtmangiz:\n";
                $i = 1;
                $total = 0;
                foreach($basket as $b){
                    $product = Product::where('id',$b->product_id)->first();
                    $total +=  $b->count*$product->price;
                    $text .= $i.". ".$product->name_uz." = ".$b->count." x ".$product->price." = ".number_format($b->count*$product->price)."\n";
                    $i++;
                }
                $text .= "\nUmumiy narxi: ".number_format($total)." so'm";
                $text .= "\n\nAddress: ".$package->address;
                $this->bot('sendMessage',[
                    'chat_id'=>$cid,
                    'text'=>$text,
                    'parse_mode'=>'HTML',
                    'reply_markup'=>$confirmation_uz
                ]);
            }else if($lang == 2){
                $text = "📍 Буюртмани тасдиқлаш\n\n";
                $text .= "Буюртмангиз:\n";
                $i = 1;
                $total = 0;
                foreach($basket as $b){
                    $product = Product::where('id',$b->product_id)->first();
                    $total +=  $b->count*$product->price;
                    $text .= $i.". ".$product->name_en." = ".$b->count." x ".$product->price." = ".number_format($b->count*$product->price)."\n";
                    $i++;
                }
                $text .= "\nУмумий нархи: ".number_format($total)." сўм";
                $text .= "\n\nАддресс: ".$package->address;
                $this->bot('sendMessage',[
                    'chat_id'=>$cid,
                    'text'=>$text,
                    'parse_mode'=>'HTML',
                    'reply_markup'=>$confirmation_uzb
                ]);
            }else{
                $text = "📍 Выполнить заказ\n\n";
                $text .= "Не заказывайте:\n";
                $i = 1;
                $total = 0;
                foreach($basket as $b){
                    $product = Product::where('id',$b->product_id)->first();
                    $total +=  $b->count*$product->price;
                    $text .= $i.". ".$product->name_ru." = ".$b->count." x ".$product->price." = ".number_format($b->count*$product->price)."\n";
                    $i++;
                }
                $text .= "\nИтоговая цена: ".number_format($total)." сумма";
                $text .= "\n\nАдрес: ".$package->address;
                $this->bot('sendMessage',[
                    'chat_id'=>$cid,
                    'text'=>$text,
                    'parse_mode'=>'HTML',
                    'reply_markup'=>$confirmation_ru
                ]);
            }

        }

        if($tx == "📞 Biz bilan aloqa" or $tx == "📞 Биз билан алоқа" or $tx == "📞 Связь с нами"){
            $contact = Contact::latest()->first();
            if($lang == 1){
                $this->bot('sendMessage',[
                    'chat_id'=>$cid,
                    'text'=>"Yagona qo'ng'iroq markazi: ".$contact->phone."\nTelegram kanalimiz: ".$contact->channel,
                    'parse_mode'=>'HTML',
                ]);
            }else if($lang ==2){
                $this->bot('sendMessage',[
                    'chat_id'=>$cid,
                    'text'=>"Ягона қўнғироқ маркази: ".$contact->phone."\nТелеграм каналимиз: ".$contact->channel,
                    'parse_mode'=>'HTML',
                ]);
            }else if($lang == 3){
                $this->bot('sendMessage',[
                    'chat_id'=>$cid,
                    'text'=>"Единый колл-центр:: ".$contact->phone."\nНаш телеграмм канал: ".$contact->channel,
                    'parse_mode'=>'HTML',
                ]);
            }
        }

        if($tx == "⚙️ Sozlamalar" or $tx == "⚙️ Созламалар" or $tx == "⚙️ Настройки"){
            $data = [];
            $data[] = [['text' => "O'zbekcha", 'callback_data' => "uz"],['text' => "Ўзбекча", 'callback_data' => "uzb"],['text' => "Руский язык", 'callback_data' => "ru"],];
            $data[] = [['text' => $user->phone, 'callback_data' => "phone_change"],];
            $page = array("inline_keyboard" => $data,);
            $page = json_encode($page,true);
            User::where('id',$user->id)->update([
                'step'=>20,
            ]);
            if($lang == 1){
                $this->bot('sendMessage',[
                    'chat_id'=>$cid,
                    'text'=>"O'zgartirmoqchi bo'lgan ma'lumotizni tanlang.",
                    'parse_mode'=>'HTML',
                    'reply_markup'=>$page,
                ]);
            }else if($lang == 2){
                $this->bot('sendMessage',[
                    'chat_id'=>$cid,
                    'text'=>"Ўзгартирмоқчи бўлган маълумотизни танланг.",
                    'parse_mode'=>'HTML',
                    'reply_markup'=>$page,
                ]);
            }else if($lang == 3){
                $this->bot('sendMessage',[
                    'chat_id'=>$cid,
                    'text'=>"Выберите информацию, которую хотите изменить.",
                    'parse_mode'=>'HTML',
                    'reply_markup'=>$page,
                ]);
            }
        }

        if($step == 20){
            if($tx == "uz"){
                $this->bot('deleteMessage',
                    ['chat_id'=>$cid,'message_id'=>$mid,]
                );
                User::where('id',$user->id)->update([
                    'step'=>0,
                    'lang'=>1
                ]);
                $this->bot('sendMessage',[
                    'chat_id'=>$cid,
                    'text'=>"Kerakli menyuni tanlang:",
                    'parse_mode'=>'HTML',
                    'reply_markup'=>$main_uz
                ]);
            }else if($tx == "uzb"){
                $this->bot('deleteMessage',
                    ['chat_id'=>$cid,'message_id'=>$mid,]
                );
                User::where('id',$user->id)->update([
                    'step'=>0,
                    'lang'=>2,
                ]);
                $this->bot('sendMessage',[
                    'chat_id'=>$cid,
                    'text'=>"Керакли менюни танланг:",
                    'parse_mode'=>'HTML',
                    'reply_markup'=>$main_uzb
                ]);
            }else if($tx == "ru"){
                $this->bot('deleteMessage',
                    ['chat_id'=>$cid,'message_id'=>$mid,]
                );

                User::where('id',$user->id)->update([
                    'step'=>0,
                    'lang'=>3,
                ]);
                $this->bot('sendMessage',[
                    'chat_id'=>$cid,
                    'text'=>"Выберите нужное меню:",
                    'parse_mode'=>'HTML',
                    'reply_markup'=>$main_ru
                ]);
            }else if($tx == "phone_change"){
                $this->bot('deleteMessage',
                    ['chat_id'=>$cid,'message_id'=>$mid,]
                );
                User::where('id',$user->id)->update([
                    'step'=>21,
                ]);
                if($lang == 1){
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>'Telefon raqamingizni +998900000000 ko\'rinishida yoki "Raqamni jo\'natish" tugmasini bosish orqali jo\'nating.',
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$phone_send_uz
                    ]);
                }else if($lang == 2){
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>'Телефон рақамингизни +998900000000 кўринишида ёки "Рақамни жўнатиш" тугмасини босиш орқали жўнатинг.',
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$phone_send_uzb
                    ]);
                }else if($lang == 3){
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>'Отправьте свой номер телефона в форме +998900000000 или нажав кнопку "Отправить номер".',
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$phone_send_ru
                    ]);
                }
            }
        }

        if($step == 21){
            $code = rand(10000,99999);
            if($lang == 1){
                $text = "Ushbu kodni hech kimga bermang!!! \n\n Tasdiqlash kodi: $code";
            }else if($lang == 2){
                $text = "Ушбу кодни ҳеч кимга берманг!!! \n\n Тасдиқлаш коди: $code";
            }else{
                $text = "Никому не сообщайте этот код!!! \n\n Код подтверждения: $code";
            }

            $bool = true;
            if(empty($phone)){
                $len = strlen($tx);
                $phone = $tx;
                if($len != 13){
                    $bool=false;
                    if($lang == 1){
                        $this->bot('sendMessage',[
                            'chat_id'=>$cid,
                            'text'=>"Kechirasiz, raqam xato kiritdingiz. +998901234567 ko'rinishida yoki tugma orqali jo'nating.",
                            'parse_mode'=>'HTML',
                        ]);
                    }else if($lang == 2){
                        $this->bot('sendMessage',[
                            'chat_id'=>$cid,
                            'text'=>"Кечирасиз, рақам хато киритдингиз. +998901234567 кўринишида ёки тугма орқали жўнатинг.",
                            'parse_mode'=>'HTML',
                        ]);
                    }else{
                        $this->bot('sendMessage',[
                            'chat_id'=>$cid,
                            'text'=>"Извините, вы ввели ошибочный номер. Отправить по форме +998901234567 или через кнопку.",
                            'parse_mode'=>'HTML',
                        ]);
                    }
                }
            }


            if($bool){
                $phone=str_replace("+","",$phone);
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => "notify.eskiz.uz/api/message/sms/send",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => array('mobile_phone' => $phone,'message' => $text,'from' => '4546'),
                    CURLOPT_HTTPHEADER => array(
                        "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjQ5NSwicm9sZSI6InVzZXIiLCJkYXRhIjp7ImlkIjo0OTUsIm5hbWUiOiJcdTA0MjdcdTA0MWYgRmFyZydvbmEgS2Ftb2xvdCIsImVtYWlsIjoiaW5mb0BwYWxtYWZlcmdhbmEudXoiLCJyb2xlIjoidXNlciIsImFwaV90b2tlbiI6bnVsbCwic3RhdHVzIjoiYWN0aXZlIiwic21zX2FwaV9sb2dpbiI6ImVza2l6MiIsInNtc19hcGlfcGFzc3dvcmQiOiJlJCRrIXoiLCJ1el9wcmljZSI6NTAsImJhbGFuY2UiOjI5MzUwMCwiaXNfdmlwIjowLCJob3N0Ijoic2VydmVyMSIsImNyZWF0ZWRfYXQiOiIyMDIxLTA0LTI5VDA4OjU3OjQ1LjAwMDAwMFoiLCJ1cGRhdGVkX2F0IjoiMjAyMi0wNC0xOFQxMjozNToxOC4wMDAwMDBaIn0sImlhdCI6MTY1MDc4NDI0MSwiZXhwIjoxNjUzMzc2MjQxfQ.oUS8dK6kKpFX8lbshN4zheET0YIDglRo_iB5J8ckcd4"
                    ),
                ));
                $response = json_decode(curl_exec($curl),true);
                curl_close($curl);

                User::where('id',$user->id)->update([
                    'step'=>22,
                    'change_phone'=>$phone,
                    'code'=>$code,
                    'code_due_date'=>date('Y-m-d H:i:s', strtotime("+2 minute")),
                ]);


                if($lang == 1){
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>"Raqamingizga jo'natilgan kodni kiriting.",
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$phone_code_change_uz
                    ]);
                }else if($lang == 2){
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>"Рақамингизга жўнатилган кодни киритинг.",
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$phone_code_change_uzb
                    ]);
                }else{
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>"Введите код, отправленный на ваш номер.",
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$phone_code_change_ru
                    ]);
                }
            }
        }

        if($step == 22){
            $bool = true;
            if($tx == "Kodni qayta jo'natish" or $tx == "Кодни қайта жўнатиш" or $tx == "Отправить код еще раз"){
                $bool = false;
                $code = rand(10000,99999);
                if($lang == 1){
                    $text = "Ushbu kodni hech kimga bermang!!! \n\n Tasdiqlash kodi: $code";
                }else if($lang == 2){
                    $text = "Ушбу кодни ҳеч кимга берманг!!! \n\n Тасдиқлаш коди: $code";
                }else{
                    $text = "Никому не сообщайте этот код!!! \n\n Код подтверждения: $code";
                }
                User::where('id',$user->id)->update([
                    'code'=>$code,
                    'code_due_date'=>date('Y-m-d H:i:s', strtotime("+2 minute")),
                ]);

                $phone=str_replace("+","",$user->change_phone);
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => "notify.eskiz.uz/api/message/sms/send",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => array('mobile_phone' => $phone,'message' => $text,'from' => '4546'),
                    CURLOPT_HTTPHEADER => array(
                        "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjQ5NSwicm9sZSI6InVzZXIiLCJkYXRhIjp7ImlkIjo0OTUsIm5hbWUiOiJcdTA0MjdcdTA0MWYgRmFyZydvbmEgS2Ftb2xvdCIsImVtYWlsIjoiaW5mb0BwYWxtYWZlcmdhbmEudXoiLCJyb2xlIjoidXNlciIsImFwaV90b2tlbiI6bnVsbCwic3RhdHVzIjoiYWN0aXZlIiwic21zX2FwaV9sb2dpbiI6ImVza2l6MiIsInNtc19hcGlfcGFzc3dvcmQiOiJlJCRrIXoiLCJ1el9wcmljZSI6NTAsImJhbGFuY2UiOjI5MzUwMCwiaXNfdmlwIjowLCJob3N0Ijoic2VydmVyMSIsImNyZWF0ZWRfYXQiOiIyMDIxLTA0LTI5VDA4OjU3OjQ1LjAwMDAwMFoiLCJ1cGRhdGVkX2F0IjoiMjAyMi0wNC0xOFQxMjozNToxOC4wMDAwMDBaIn0sImlhdCI6MTY1MDc4NDI0MSwiZXhwIjoxNjUzMzc2MjQxfQ.oUS8dK6kKpFX8lbshN4zheET0YIDglRo_iB5J8ckcd4"
                    ),
                ));
                $response = json_decode(curl_exec($curl),true);
                curl_close($curl);
                if($lang == 1){
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>"Raqamingizga jo'natilgan kodni kiriting.",
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$phone_code_change_uz
                    ]);
                }else if($lang == 2){
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>"Рақамингизга жўнатилган кодни киритинг.",
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$phone_code_change_uzb
                    ]);
                }else{
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>"Введите код, отправленный на ваш номер.",
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$phone_code_change_ru
                    ]);
                }
            }

            if($tx == "❌ Bekor qilish" or $tx == "❌ Бекор қилиш" or $tx == "❌ Отмена"){
                $bool = false;
                User::where('id',$user->id)->update([
                    'step'=>0,
                ]);
                if($lang == 1){
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>"Kerakli menyuni tanlang:",
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$main_uz
                    ]);
                }else if($lang == 2){
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>"Керакли менюни танланг:",
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$main_uzb
                    ]);
                }else{
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>"Выберите нужное меню:",
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$main_ru
                    ]);
                }
            }

            if($bool){
                if($user->code == $tx){
                    User::where('id',$user->id)->update([
                        'step'=>0,
                        'phone'=>$user->change_phone,
                    ]);
                    if($lang == 1){
                        $this->bot('sendMessage',[
                            'chat_id'=>$cid,
                            'text'=>"Telefon raqamingiz o'zgartirildi.Kerakli menyuni tanlang:",
                            'parse_mode'=>'HTML',
                            'reply_markup'=>$main_uz
                        ]);
                    }else if($lang == 2){
                        $this->bot('sendMessage',[
                            'chat_id'=>$cid,
                            'text'=>"Телефон рақамингиз ўзгартирилди.Керакли менюни танланг:",
                            'parse_mode'=>'HTML',
                            'reply_markup'=>$main_uzb
                        ]);
                    }else{
                        $this->bot('sendMessage',[
                            'chat_id'=>$cid,
                            'text'=>"Ваш номер телефона изменился.Выберите нужное меню:",
                            'parse_mode'=>'HTML',
                            'reply_markup'=>$main_ru
                        ]);
                    }
                }else{
                    if($lang == 1){
                        $this->bot('sendMessage',[
                            'chat_id'=>$cid,
                            'text'=>"Tasdiqlash kodi xato, qaytadan urinib ko'ring.",
                            'parse_mode'=>'HTML',
                        ]);
                    }else if($lang == 2){
                        $this->bot('sendMessage',[
                            'chat_id'=>$cid,
                            'text'=>"Тасдиқлаш коди хато, қайтадан уриниб кўринг.",
                            'parse_mode'=>'HTML',
                        ]);
                    }else if($lang == 3){
                        $this->bot('sendMessage',[
                            'chat_id'=>$cid,
                            'text'=>"Ошибка кода подтверждения, попробуйте еще раз.",
                            'parse_mode'=>'HTML',
                        ]);
                    }
                }
            }
        }

        if(($step == 10 or $step == 0) and ($tx == "🔙 orqaga" or $tx == "🔙 орқага" or $tx == "🔙 назад")){
            User::where('id',$user->id)->update([
                'step'=>0,
            ]);
            if($lang == 1){
                $this->bot('sendMessage',[
                    'chat_id'=>$cid,
                    'text'=>"Kerakli menyuni tanlang:",
                    'parse_mode'=>'HTML',
                    'reply_markup'=>$main_uz
                ]);
            }else if($lang == 2){
                $this->bot('sendMessage',[
                    'chat_id'=>$cid,
                    'text'=>"Керакли менюни танланг:",
                    'parse_mode'=>'HTML',
                    'reply_markup'=>$main_uzb
                ]);
            }else{
                $this->bot('sendMessage',[
                    'chat_id'=>$cid,
                    'text'=>"Выберите нужное меню:",
                    'parse_mode'=>'HTML',
                    'reply_markup'=>$main_ru
                ]);
            }
        }

        if($step == 10){
            $explode = explode(" ",$tx);
            if($explode[0] == "savat"){
                $basket = Basket::where('user_id',$user->id)->where('product_id',$explode[1])->first();
                $product = Product::where('id',$explode[1])->first();
                if(empty($basket)){

                    Basket::create([
                        'product_id'=>$explode[1],
                        'user_id' => $user->id,
                        'count' => $explode[2],
                    ]);
                    if($lang == 1){
                        $this->bot("editMessageCaption",[
                            'chat_id' => $cid,
                            'message_id' => $mid,
                            'caption' => $product->name_uz."\n\n".base64_decode($product->content_uz)."\n\n"."Narxi:".number_format($product->price*$explode[2])." so'm",
                            'reply_markup' => json_encode([
                                'inline_keyboard' => [
                                    [['text' => "-", 'callback_data' => "minus ".$product->id." ".$explode[2]], ['text' => $explode[2]." ta", 'callback_data' => 'count '.$explode[2]], ['text' => "+", 'callback_data' => "plus ".$product->id." ".$explode[2]]],
                                    [['text' => "❌  Savatdan o'chirish", 'callback_data' => 'delete '.$product->id]],
                                ]
                            ])
                        ]);
                    }else if($lang == 2){

                        $this->bot("editMessageCaption",[
                            'chat_id' => $cid,
                            'message_id' => $mid,
                            'caption' => $product->name_en."\n\n".base64_decode($product->content_en)."\n\n"."Нархи:".number_format($product->price*$explode[2])." сўм",
                            'reply_markup' => json_encode([
                                'inline_keyboard' => [
                                    [['text' => "-", 'callback_data' => "minus ".$product->id." ".$explode[2]], ['text' => $explode[2]." та", 'callback_data' => 'count '.$explode[2]], ['text' => "+", 'callback_data' => "plus ".$product->id." ".$explode[2]]],
                                    [['text' => "❌  Саватдан ўчириш", 'callback_data' => 'delete '.$product->id]],
                                ]
                            ])
                        ]);

                    }else{
                        $this->bot("editMessageCaption",[
                            'chat_id' => $cid,
                            'message_id' => $mid,
                            'caption' => $product->name_ru."\n\n".base64_decode($product->content_ru)."\n\n"."Цена:".number_format($product->price*$explode[2])." сумма",
                            'reply_markup' => json_encode([
                                'inline_keyboard' => [
                                    [['text' => "-", 'callback_data' => "minus ".$product->id." ".$explode[2]], ['text' => $explode[2]." та", 'callback_data' => 'count '.$explode[2]], ['text' => "+", 'callback_data' => "plus ".$product->id." ".$explode[2]]],
                                    [['text' => "❌  Удалить из корзины", 'callback_data' => 'delete '.$product->id]],
                                ]
                            ])
                        ]);
                    }
                }else{
                    if($lang == 1){
                        $this->bot("answerCallbackQuery",[
                            'callback_query_id' => $cqid,
                            'text' => "Kechirasiz, bu mahsulot savatda bor",
                            'show_alert' => true
                        ]);
                    }else if($lang == 2){
                        $this->bot("answerCallbackQuery",[
                            'callback_query_id' => $cqid,
                            'text' => "Кечирасиз, бу маҳсулот саватда бор",
                            'show_alert' => true
                        ]);
                    }else{
                        $this->bot("answerCallbackQuery",[
                            'callback_query_id' => $cqid,
                            'text' => "Извините, этот товар в корзине",
                            'show_alert' => true
                        ]);
                    }
                }
            }else if($explode[0] == "minus"){

                if($explode[2] > 1){
                    $product = Product::where('id',$explode[1])->first();
                    $count = $explode[2]-1;
                    if($lang == 1){
                        $this->bot("editMessageCaption",[
                            'chat_id' => $cid,
                            'message_id' => $mid,
                            'caption' => $product->name_uz."\n\n".base64_decode($product->content_uz)."\n\n"."Narxi:".number_format($product->price*$count)." so'm",
                            'reply_markup' => json_encode([
                                'inline_keyboard' => [
                                    [['text' => "-", 'callback_data' => "minus ".$product->id." ".$count], ['text' => "$count ta", 'callback_data' => 'count'], ['text' => "+", 'callback_data' => "plus ".$product->id." ".$count]],
                                    [['text' => "🛒  Savatga qo'shish", 'callback_data' => 'savat '.$product->id." ".$count]],
                                ]
                            ])
                        ]);
                    }else if($lang == 2){
                        $this->bot("editMessageCaption",[
                            'chat_id' => $cid,
                            'message_id' => $mid,
                            'caption' => $product->name_en."\n\n".base64_decode($product->content_en)."\n\n"."Нархи:".number_format($product->price*$count)." сўм",
                            'reply_markup' => json_encode([
                                'inline_keyboard' => [
                                    [['text' => "-", 'callback_data' => "minus ".$product->id." ".$count], ['text' => "$count та", 'callback_data' => 'count'], ['text' => "+", 'callback_data' => "plus ".$product->id." ".$count]],
                                    [['text' => "🛒  Саватга қўшиш", 'callback_data' => 'savat '.$product->id." ".$count]],
                                ]
                            ])
                        ]);
                    }else{
                        $this->bot("editMessageCaption",[
                            'chat_id' => $cid,
                            'message_id' => $mid,
                            'caption' => $product->name_ru."\n\n".base64_decode($product->content_ru)."\n\n"."Цена:".number_format($product->price*$count)." сумма",
                            'reply_markup' => json_encode([
                                'inline_keyboard' => [
                                    [['text' => "-", 'callback_data' => "minus ".$product->id." ".$count], ['text' => "$count та", 'callback_data' => 'count'], ['text' => "+", 'callback_data' => "plus ".$product->id." ".$count]],
                                    [['text' => "🛒  Добавить в корзину", 'callback_data' => 'savat '.$product->id." ".$count]],
                                ]
                            ])
                        ]);
                    }
                }else{
                    if($lang == 1){
                        $this->bot("answerCallbackQuery",[
                            'callback_query_id' => $cqid,
                            'text' => "Kechirasiz, boshqa kamaytira olmaysiz",
                            'show_alert' => true
                        ]);

                    }else if($lang == 2){
                        $this->bot("answerCallbackQuery",[
                            'callback_query_id' => $cqid,
                            'text' => "Кечирасиз, бошқа камайтира олмайсиз",
                            'show_alert' => true
                        ]);
                    }else{
                        $this->bot("answerCallbackQuery",[
                            'callback_query_id' => $cqid,
                            'text' => "Извините, уменьшить больше нельзя",
                            'show_alert' => true
                        ]);
                    }
                }
            }else if($explode[0] == "plus"){
                $product = Product::where('id',$explode[1])->first();
                $count = $explode[2]+1;
                if($lang == 1){
                    $this->bot("editMessageCaption",[
                        'chat_id' => $cid,
                        'message_id' => $mid,
                        'caption' => $product->name_uz."\n\n".base64_decode($product->content_uz)."\n\n"."Narxi:".number_format($product->price*$count)." so'm",
                        'reply_markup' => json_encode([
                            'inline_keyboard' => [
                                [['text' => "-", 'callback_data' => "minus ".$product->id." ".$count], ['text' => "$count ta", 'callback_data' => 'count'], ['text' => "+", 'callback_data' => "plus ".$product->id." ".$count]],
                                [['text' => "🛒  Savatga qo'shish", 'callback_data' => 'savat '.$product->id." ".$count]],
                            ]
                        ])
                    ]);
                }else if($lang == 2){
                    $this->bot("editMessageCaption",[
                        'chat_id' => $cid,
                        'message_id' => $mid,
                        'caption' => $product->name_en."\n\n".base64_decode($product->content_en)."\n\n"."Нархи:".number_format($product->price*$count)." сўм",
                        'reply_markup' => json_encode([
                            'inline_keyboard' => [
                                [['text' => "-", 'callback_data' => "minus ".$product->id." ".$count], ['text' => "$count та", 'callback_data' => 'count'], ['text' => "+", 'callback_data' => "plus ".$product->id." ".$count]],
                                [['text' => "🛒  Саватга қўшиш", 'callback_data' => 'savat '.$product->id." ".$count]],
                            ]
                        ])
                    ]);
                }else{
                    $this->bot("editMessageCaption",[
                        'chat_id' => $cid,
                        'message_id' => $mid,
                        'caption' => $product->name_ru."\n\n".base64_decode($product->content_ru)."\n\n"."Цена:".number_format($product->price*$count)." сумма",
                        'reply_markup' => json_encode([
                            'inline_keyboard' => [
                                [['text' => "-", 'callback_data' => "minus ".$product->id." ".$count], ['text' => "$count та", 'callback_data' => 'count'], ['text' => "+", 'callback_data' => "plus ".$product->id." ".$count]],
                                [['text' => "🛒  Добавить в корзину", 'callback_data' => 'savat '.$product->id." ".$count]],
                            ]
                        ])
                    ]);
                }
            }else if($explode[0] == "delete"){
                $product = Product::where('id',$explode[1])->first();
                Basket::where('user_id',$user->id)->where('product_id',$product->id)->delete();
                if($lang == 1){
                    $this->bot("editMessageCaption",[
                        'chat_id' => $cid,
                        'message_id' => $mid,
                        'caption' => $product->name_uz."\n\n".base64_decode($product->content_uz)."\n\n"."Narxi:".number_format($product->price)." so'm",
                        'reply_markup' => json_encode([
                            'inline_keyboard' => [
                                [['text' => "-", 'callback_data' => "minus ".$product->id." 1"], ['text' => "1 ta", 'callback_data' => 'count'], ['text' => "+", 'callback_data' => "plus ".$product->id." 1"]],
                                [['text' => "🛒  Savatga qo'shish", 'callback_data' => 'savat '.$product->id." 1"]],
                            ]
                        ])
                    ]);
                }else if($lang == 2){
                    $this->bot("editMessageCaption",[
                        'chat_id' => $cid,
                        'message_id' => $mid,
                        'caption' => $product->name_en."\n\n".base64_decode($product->content_en)."\n\n"."Нархи:".number_format($product->price)." сўм",
                        'reply_markup' => json_encode([
                            'inline_keyboard' => [
                                [['text' => "-", 'callback_data' => "minus ".$product->id." 1"], ['text' => "1 та", 'callback_data' => 'count'], ['text' => "+", 'callback_data' => "plus ".$product->id." 1"]],
                                [['text' => "🛒  Саватга қўшиш", 'callback_data' => 'savat '.$product->id." 1"]],
                            ]
                        ])
                    ]);
                }else{
                    $this->bot("editMessageCaption",[
                        'chat_id' => $cid,
                        'message_id' => $mid,
                        'caption' => $product->name_ru."\n\n".base64_decode($product->content_ru)."\n\n"."Цена:".number_format($product->price)." сумма",
                        'reply_markup' => json_encode([
                            'inline_keyboard' => [
                                [['text' => "-", 'callback_data' => "minus ".$product->id." 1"], ['text' => "1 ta", 'callback_data' => 'count'], ['text' => "+", 'callback_data' => "plus ".$product->id." 1"]],
                                [['text' => "🛒  Добавить в корзину", 'callback_data' => 'savat '.$product->id." 1"]],
                            ]
                        ])
                    ]);
                }
            }else if($explode[0] == "delete_official" or $explode[0] == "minus_official" or $explode[0] == "plus_official"){
                if($explode[0] == "delete_official")
                    $b = Basket::where('id',$explode[1])->delete();

                if($explode[0] == "plus_official"){
                    $b = Basket::where('id',$explode[1])->first();
                    $count = $b->count+1;
                    $b->update([
                        'count'=>$count,
                    ]);
                }

                if($explode[0] == "minus_official"){
                    $b = Basket::where('id',$explode[1])->first();
                    $count = $b->count-1;
                    if($count < 1){
                        if($lang == 1){
                            $this->bot("answerCallbackQuery",[
                                'callback_query_id' => $cqid,
                                'text' => "Kechirasiz, boshqa kamaytira olmaysiz",
                                'show_alert' => true
                            ]);

                        }else if($lang == 2){
                            $this->bot("answerCallbackQuery",[
                                'callback_query_id' => $cqid,
                                'text' => "Кечирасиз, бошқа камайтира олмайсиз",
                                'show_alert' => true
                            ]);
                        }else{
                            $this->bot("answerCallbackQuery",[
                                'callback_query_id' => $cqid,
                                'text' => "Извините, уменьшить больше нельзя",
                                'show_alert' => true
                            ]);
                        }
                    }else{
                        $b->update([
                            'count'=>$count,
                        ]);
                    }
                }

                $basket = Basket::where('user_id',$user->id)->get();
                if(count($basket)>=1){
                    if($lang == 1){
                        $text = ""; $i = 1;
                        $total = 0;
                        $data = [];
                        foreach($basket as $b){
                            $product = Product::where('id',$b->product_id)->first();
                            $total +=  $b->count*$product->price;
                            $text .= $i.". ".$product->name_uz." = ".$b->count." x ".$product->price." = ".number_format($b->count*$product->price)." so'm\n";
                            $data[] = [['text' => "-", 'callback_data' => "minus_official ".$b->id],['text' => "❌  ".$i.". ".$product->name_uz, 'callback_data' => "delete_official ".$b->id],['text' => "+", 'callback_data' => "plus_official ".$b->id]];
                            $i++;
                        }
                        $text .= "\nUmumiy: ".number_format($total)." so'm";
                        $page = array("inline_keyboard" => $data,);
                        $page = json_encode($page,true);
                        $this->bot('editMessageText',[
                            'chat_id'=>$cid,
                            'message_id' => $mid,
                            'text'=>$text,
                            'parse_mode'=>'HTML',
                            'reply_markup'=>$page
                        ]);
                    }else if($lang == 2){

                        $text = ""; $i = 1;
                        $total = 0;
                        $data = [];
                        foreach($basket as $b){
                            $product = Product::where('id',$b->product_id)->first();
                            $total +=  $b->count*$product->price;
                            $text .= $i.". ".$product->name_en." = ".$b->count." x ".$product->price." = ".number_format($b->count*$product->price)." сўм\n";
                            $data[] = [['text' => "-", 'callback_data' => "minus_official ".$b->id],['text' => "❌  ".$i.". ".$product->name_en, 'callback_data' => "delete_official ".$b->id],['text' => "+", 'callback_data' => "plus_official ".$b->id]];
                            $i++;
                        }
                        $text .= "\nУмумий: ".number_format($total)." сўм";
                        $page = array("inline_keyboard" => $data,);
                        $page = json_encode($page,true);
                        $this->bot('editMessageText',[
                            'chat_id'=>$cid,
                            'message_id' => $mid,
                            'text'=>$text,
                            'parse_mode'=>'HTML',
                            'reply_markup'=>$page
                        ]);
                    }else{
                        $text = ""; $i = 1;
                        $total = 0;
                        $data = [];
                        foreach($basket as $b){
                            $product = Product::where('id',$b->product_id)->first();
                            $total +=  $b->count*$product->price;
                            $text .= $i.". ".$product->name_ru." = ".$b->count." x ".$product->price." = ".number_format($b->count*$product->price)." сумма\n";
                            $data[] = [['text' => "-", 'callback_data' => "minus_official ".$b->id],['text' => "❌  ".$i.". ".$product->name_ru, 'callback_data' => "delete_official ".$b->id],['text' => "+", 'callback_data' => "plus_official ".$b->id]];
                            $i++;
                        }
                        $text .= "\nОбщий: ".number_format($total)." сумма";
                        $page = array("inline_keyboard" => $data,);
                        $page = json_encode($page,true);
                        $this->bot('editMessageText',[
                            'chat_id'=>$cid,
                            'message_id' => $mid,
                            'text'=>$text,
                            'parse_mode'=>'HTML',
                            'reply_markup'=>$page
                        ]);
                    }
                }else{
                    $this->bot('deleteMessage',
                        ['chat_id'=>$cid,'message_id'=>$mid,]
                    );

                    if($lang==1){
                        $this->bot('sendMessage',[
                            'chat_id'=>$cid,
                            'text'=>"Savat bo'sh",
                            'parse_mode'=>'HTML',
                            'reply_markup'=>$back_uz
                        ]);
                    }else if($lang == 2){
                        $this->bot('sendMessage',[
                            'chat_id'=>$cid,
                            'text'=>"Сават бўш",
                            'parse_mode'=>'HTML',
                            'reply_markup'=>$back_uzb
                        ]);
                    }else{
                        $this->bot('sendMessage',[
                            'chat_id'=>$cid,
                            'text'=>"Корзина пуста",
                            'parse_mode'=>'HTML',
                            'reply_markup'=>$back_ru
                        ]);
                    }
                }
            }
        }

        if($step == 1){
            if($tx == "uz"){
                User::where('id',$user->id)->update([
                    'step'=>2,
                    'lang'=>1,
                ]);

                $this->bot('deleteMessage',
                    ['chat_id'=>$cid,'message_id'=>$mid,]
                );
                $this->bot('sendMessage',[
                    'chat_id'=>$cid,
                    'text'=>'I\'m" kompaniyasining oilasiga xush kelibsiz. Sizni qisqa ro\'yxatdan o\'tish jarayoniga taklif etamiz.'."\n\n".'Telefon raqamingizni +998900000000 ko\'rinishida yoki "Raqamni jo\'natish" tugmasini bosish orqali jo\'nating.',
                    'parse_mode'=>'HTML',
                    'reply_markup'=>$phone_send_uz
                ]);
            }else if($tx == "uzb"){
                User::where('id',$user->id)->update([
                    'step'=>2,
                    'lang'=>2,
                ]);
                if($tx == "uzb")
                    $this->bot('deleteMessage',
                        ['chat_id'=>$cid,'message_id'=>$mid,]
                    );
                $this->bot('sendMessage',[
                    'chat_id'=>$cid,
                    'text'=>'I\'m" компаниясининг оиласига хуш келибсиз. Сизни қисқа рўйхатдан ўтиш жараёнига таклиф этамиз.'."\n\n".'Телефон рақамингизни +998900000000 кўринишида ёки "Рақамни жўнатиш" тугмасини босиш орқали жўнатинг.',
                    'parse_mode'=>'HTML',
                    'reply_markup'=>$phone_send_uzb
                ]);
            }else if($tx == "ru"){
                User::where('id',$user->id)->update([
                    'step'=>2,
                    'lang'=>3,
                ]);
                if($tx == "ru")
                    $this->bot('deleteMessage',
                        ['chat_id'=>$cid,'message_id'=>$mid,]
                    );
                $this->bot('sendMessage',[
                    'chat_id'=>$cid,
                    'text'=>'I\'m" Добро пожаловать в семью компании. Приглашаем вас пройти короткую регистрацию.'."\n\n".'Отправьте свой номер телефона в форме +998900000000 или нажав кнопку "Отправить номер".',
                    'parse_mode'=>'HTML',
                    'reply_markup'=>$phone_send_ru
                ]);
            }
        }else if($step == 2){
            $code = rand(10000,99999);
            if($lang == 1){
                $text = "Ushbu kodni hech kimga bermang!!! \n\n Tasdiqlash kodi: $code";
            }else if($lang == 2){
                $text = "Ушбу кодни ҳеч кимга берманг!!! \n\n Тасдиқлаш коди: $code";
            }else{
                $text = "Никому не сообщайте этот код!!! \n\n Код подтверждения: $code";
            }

            $bool=true;
            if(!empty($phone)){
                $phone=str_replace("+","",$phone);
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => "notify.eskiz.uz/api/message/sms/send",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => array('mobile_phone' => $phone,'message' => $text,'from' => '4546'),
                    CURLOPT_HTTPHEADER => array(
                        "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjQ5NSwicm9sZSI6InVzZXIiLCJkYXRhIjp7ImlkIjo0OTUsIm5hbWUiOiJcdTA0MjdcdTA0MWYgRmFyZydvbmEgS2Ftb2xvdCIsImVtYWlsIjoiaW5mb0BwYWxtYWZlcmdhbmEudXoiLCJyb2xlIjoidXNlciIsImFwaV90b2tlbiI6bnVsbCwic3RhdHVzIjoiYWN0aXZlIiwic21zX2FwaV9sb2dpbiI6ImVza2l6MiIsInNtc19hcGlfcGFzc3dvcmQiOiJlJCRrIXoiLCJ1el9wcmljZSI6NTAsImJhbGFuY2UiOjI5MzUwMCwiaXNfdmlwIjowLCJob3N0Ijoic2VydmVyMSIsImNyZWF0ZWRfYXQiOiIyMDIxLTA0LTI5VDA4OjU3OjQ1LjAwMDAwMFoiLCJ1cGRhdGVkX2F0IjoiMjAyMi0wNC0xOFQxMjozNToxOC4wMDAwMDBaIn0sImlhdCI6MTY1MDc4NDI0MSwiZXhwIjoxNjUzMzc2MjQxfQ.oUS8dK6kKpFX8lbshN4zheET0YIDglRo_iB5J8ckcd4"
                    ),
                ));
                $response = json_decode(curl_exec($curl),true);
                curl_close($curl);

                User::where('id',$user->id)->update([
                    'step'=>3,
                    'phone'=>$phone,
                    'code'=>$code,
                    'code_due_date'=>date('Y-m-d H:i:s', strtotime("+2 minute")),
                ]);
            }else{
                $len = strlen($tx);
                if($len == 13){
                    $phone=str_replace("+","",$tx);
                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                        CURLOPT_URL => "notify.eskiz.uz/api/message/sms/send",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "POST",
                        CURLOPT_POSTFIELDS => array('mobile_phone' => $phone,'message' => $text,'from' => '4546'),
                        CURLOPT_HTTPHEADER => array(
                            "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjQ5NSwicm9sZSI6InVzZXIiLCJkYXRhIjp7ImlkIjo0OTUsIm5hbWUiOiJcdTA0MjdcdTA0MWYgRmFyZydvbmEgS2Ftb2xvdCIsImVtYWlsIjoiaW5mb0BwYWxtYWZlcmdhbmEudXoiLCJyb2xlIjoidXNlciIsImFwaV90b2tlbiI6bnVsbCwic3RhdHVzIjoiYWN0aXZlIiwic21zX2FwaV9sb2dpbiI6ImVza2l6MiIsInNtc19hcGlfcGFzc3dvcmQiOiJlJCRrIXoiLCJ1el9wcmljZSI6NTAsImJhbGFuY2UiOjI5MzUwMCwiaXNfdmlwIjowLCJob3N0Ijoic2VydmVyMSIsImNyZWF0ZWRfYXQiOiIyMDIxLTA0LTI5VDA4OjU3OjQ1LjAwMDAwMFoiLCJ1cGRhdGVkX2F0IjoiMjAyMi0wNC0xOFQxMjozNToxOC4wMDAwMDBaIn0sImlhdCI6MTY1MDc4NDI0MSwiZXhwIjoxNjUzMzc2MjQxfQ.oUS8dK6kKpFX8lbshN4zheET0YIDglRo_iB5J8ckcd4"
                        ),
                    ));
                    $response = json_decode(curl_exec($curl),true);
                    curl_close($curl);
                    User::where('id',$user->id)->update([
                        'step'=>3,
                        'phone'=>$tx,
                        'code'=>$code,
                        'code_due_date'=>date('Y-m-d H:i:s', strtotime("+2 minute")),
                    ]);
                }else{
                    $bool=false;
                    if($lang == 1){
                        $this->bot('sendMessage',[
                            'chat_id'=>$cid,
                            'text'=>"Kechirasiz, raqam xato kiritdingiz. +998901234567 ko'rinishida yoki tugma orqali jo'nating.",
                            'parse_mode'=>'HTML',
                        ]);
                    }else if($lang == 2){
                        $this->bot('sendMessage',[
                            'chat_id'=>$cid,
                            'text'=>"Кечирасиз, рақам хато киритдингиз. +998901234567 кўринишида ёки тугма орқали жўнатинг.",
                            'parse_mode'=>'HTML',
                        ]);
                    }else{
                        $this->bot('sendMessage',[
                            'chat_id'=>$cid,
                            'text'=>"Извините, вы ввели ошибочный номер. Отправить по форме +998901234567 или через кнопку.",
                            'parse_mode'=>'HTML',
                        ]);
                    }
                }
            }

            if($bool){
                if($lang == 1){
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>"Raqamingizga jo'natilgan kodni kiriting.",
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$phone_code_uz
                    ]);
                }else if($lang == 2){
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>"Рақамингизга жўнатилган кодни киритинг.",
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$phone_code_uzb
                    ]);
                }else{
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>"Введите код, отправленный на ваш номер.",
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$phone_code_ru
                    ]);
                }
            }
        }else if($step == 3){
            $bool = true;
            if($tx == "Kodni qayta jo'natish" or $tx == "Кодни қайта жўнатиш" or $tx == "Отправить код еще раз"){
                $bool = false;
                $code = rand(10000,99999);
                if($lang == 1){
                    $text = "Ushbu kodni hech kimga bermang!!! \n\n Tasdiqlash kodi: $code";
                }else if($lang == 2){
                    $text = "Ушбу кодни ҳеч кимга берманг!!! \n\n Тасдиқлаш коди: $code";
                }else{
                    $text = "Никому не сообщайте этот код!!! \n\n Код подтверждения: $code";
                }
                User::where('id',$user->id)->update([
                    'step'=>3,
                    'code'=>$code,
                    'code_due_date'=>date('Y-m-d H:i:s', strtotime("+2 minute")),
                ]);

                $phone=str_replace("+","",$user->phone);
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => "notify.eskiz.uz/api/message/sms/send",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => array('mobile_phone' => $phone,'message' => $text,'from' => '4546'),
                    CURLOPT_HTTPHEADER => array(
                        "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjQ5NSwicm9sZSI6InVzZXIiLCJkYXRhIjp7ImlkIjo0OTUsIm5hbWUiOiJcdTA0MjdcdTA0MWYgRmFyZydvbmEgS2Ftb2xvdCIsImVtYWlsIjoiaW5mb0BwYWxtYWZlcmdhbmEudXoiLCJyb2xlIjoidXNlciIsImFwaV90b2tlbiI6bnVsbCwic3RhdHVzIjoiYWN0aXZlIiwic21zX2FwaV9sb2dpbiI6ImVza2l6MiIsInNtc19hcGlfcGFzc3dvcmQiOiJlJCRrIXoiLCJ1el9wcmljZSI6NTAsImJhbGFuY2UiOjI5MzUwMCwiaXNfdmlwIjowLCJob3N0Ijoic2VydmVyMSIsImNyZWF0ZWRfYXQiOiIyMDIxLTA0LTI5VDA4OjU3OjQ1LjAwMDAwMFoiLCJ1cGRhdGVkX2F0IjoiMjAyMi0wNC0xOFQxMjozNToxOC4wMDAwMDBaIn0sImlhdCI6MTY1MDc4NDI0MSwiZXhwIjoxNjUzMzc2MjQxfQ.oUS8dK6kKpFX8lbshN4zheET0YIDglRo_iB5J8ckcd4"
                    ),
                ));
                $response = json_decode(curl_exec($curl),true);
                curl_close($curl);
                if($lang == 1){
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>"Raqamingizga jo'natilgan kodni kiriting.",
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$phone_code_uz
                    ]);
                }else if($lang == 2){
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>"Рақамингизга жўнатилган кодни киритинг.",
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$phone_code_uzb
                    ]);
                }else{
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>"Введите код, отправленный на ваш номер.",
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$phone_code_ru
                    ]);
                }
            }
            if($tx == "🔙 orqaga" or $tx == "🔙 орқага" or $tx == "🔙 назад"){
                $bool=false;
                if($lang == 1){
                    User::where('id',$user->id)->update([
                        'step'=>2,
                    ]);
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>'I\'m" kompaniyasining oilasiga xush kelibsiz. Sizni qisqa ro\'yxatdan o\'tish jarayoniga taklif etamiz.'."\n\n".'Telefon raqamingizni +998900000000 ko\'rinishida yoki "Raqamni jo\'natish" tugmasini bosish orqali jo\'nating.',
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$phone_send_uz
                    ]);
                }else if($lang ==2){
                    User::where('id',$user->id)->update([
                        'step'=>2,
                    ]);
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>'I\'m" компаниясининг оиласига хуш келибсиз. Сизни қисқа рўйхатдан ўтиш жараёнига таклиф этамиз.'."\n\n".'Телефон рақамингизни +998900000000 кўринишида ёки "Рақамни жўнатиш" тугмасини босиш орқали жўнатинг.',
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$phone_send_uzb
                    ]);
                }else if($lang == 3){
                    User::where('id',$user->id)->update([
                        'step'=>2,
                    ]);
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>'I\'m" Добро пожаловать в семью компании. Приглашаем вас пройти короткую регистрацию.'."\n\n".'Отправьте свой номер телефона в форме +998900000000 или нажав кнопку "Отправить номер".',
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$phone_send_ru
                    ]);
                }
            }

            if($bool){
                if($user->code == $tx){
                    User::where('id',$user->id)->update([
                        'step'=>4,
                    ]);
                    if($lang == 1){
                        $this->bot('sendMessage',[
                            'chat_id'=>$cid,
                            'text'=>"Ism va familiyangizni kiriting:",
                            'parse_mode'=>'HTML',
                            'reply_markup'=>$back_uz
                        ]);
                    }else if($lang == 2){
                        $this->bot('sendMessage',[
                            'chat_id'=>$cid,
                            'text'=>"Исм ва фамилиянгизни киритинг:",
                            'parse_mode'=>'HTML',
                            'reply_markup'=>$back_uzb
                        ]);
                    }else if($lang == 3){
                        $this->bot('sendMessage',[
                            'chat_id'=>$cid,
                            'text'=>"Введите свое имя и фамилию:",
                            'parse_mode'=>'HTML',
                            'reply_markup'=>$back_ru
                        ]);
                    }
                }else{
                    if($lang == 1){
                        $phone_code_uz = json_encode([
                            'resize_keyboard' => true,
                            'one_time_keyboard' => true,
                            'keyboard' => [
                                [['text' => "🔙 orqaga"],['text' => "Kodni qayta jo'natish"],],
                            ]
                        ]);
                        $this->bot('sendMessage',[
                            'chat_id'=>$cid,
                            'text'=>"Tasdiqlash kodi xato, qaytadan urinib ko'ring.",
                            'parse_mode'=>'HTML',
                            'reply_markup'=>$phone_code_uz
                        ]);
                    }else if($lang == 2){
                        $phone_code_uzb = json_encode([
                            'resize_keyboard' => true,
                            'one_time_keyboard' => true,
                            'keyboard' => [
                                [['text' => "🔙 орқага"],['text' => "Кодни қайта жўнатиш"],],
                            ]
                        ]);
                        $this->bot('sendMessage',[
                            'chat_id'=>$cid,
                            'text'=>"Тасдиқлаш коди хато, қайтадан уриниб кўринг.",
                            'parse_mode'=>'HTML',
                            'reply_markup'=>$phone_code_uzb
                        ]);
                    }else if($lang == 3){
                        $phone_code_ru = json_encode([
                            'resize_keyboard' => true,
                            'one_time_keyboard' => true,
                            'keyboard' => [
                                [['text' => "🔙 назад"],['text' => "Отправить код еще раз"],],
                            ]
                        ]);
                        $this->bot('sendMessage',[
                            'chat_id'=>$cid,
                            'text'=>"Ошибка кода подтверждения, попробуйте еще раз.",
                            'parse_mode'=>'HTML',
                            'reply_markup'=>$phone_code_ru
                        ]);
                    }
                }
            }
        }else if($step == 4){
            if($tx == "🔙 orqaga" or $tx == "🔙 орқага" or $tx == "🔙 назад"){
                if($lang == 1){
                    User::where('id',$user->id)->update([
                        'step'=>2,
                    ]);
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>'I\'m" kompaniyasining oilasiga xush kelibsiz. Sizni qisqa ro\'yxatdan o\'tish jarayoniga taklif etamiz.'."\n\n".'Telefon raqamingizni +998900000000 ko\'rinishida yoki "Raqamni jo\'natish" tugmasini bosish orqali jo\'nating.',
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$phone_send_uz
                    ]);
                }else if($lang ==2){
                    User::where('id',$user->id)->update([
                        'step'=>2,
                    ]);
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>'I\'m" компаниясининг оиласига хуш келибсиз. Сизни қисқа рўйхатдан ўтиш жараёнига таклиф этамиз.'."\n\n".'Телефон рақамингизни +998900000000 кўринишида ёки "Рақамни жўнатиш" тугмасини босиш орқали жўнатинг.',
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$phone_send_uzb
                    ]);
                }else if($lang == 3){
                    User::where('id',$user->id)->update([
                        'step'=>2,
                    ]);
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>'I\'m" Добро пожаловать в семью компании. Приглашаем вас пройти короткую регистрацию.'."\n\n".'Отправьте свой номер телефона в форме +998900000000 или нажав кнопку "Отправить номер".',
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$phone_send_ru
                    ]);
                }
            }else{
                User::where('id',$user->id)->update([
                    'step'=>5,
                    'full_name'=>$tx,
                ]);
                if($lang == 1){
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>$tx." tavallud kuningiz bilan qachon tabriklashimiz mumkin ? 01.12.2000 ko'rinishida kiriting.",
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$back_uz
                    ]);
                }else if($lang == 2){
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>$tx." таваллуд кунингиз билан қачон табриклашимиз мумкин ? 01.12.2000 кўринишида киритинг.",
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$back_uzb
                    ]);
                }else{
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>$tx." когда можно поздравить тебя с днем рождения ? 01.12.2000 в представлении.",
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$back_ru
                    ]);
                }
            }
        }else if($step == 5){
            if($tx == "🔙 orqaga" or $tx == "🔙 орқага" or $tx == "🔙 назад"){
                User::where('id',$user->id)->update([
                    'step'=>4,
                ]);
                if($lang == 1){
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>"Ism va familiyangizni kiriting:",
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$back_uz
                    ]);
                }else if($lang == 2){
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>"Исм ва фамилиянгизни киритинг:",
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$back_uzb
                    ]);
                }else if($lang == 3){
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>"Введите свое имя и фамилию:",
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$back_ru
                    ]);
                }
            }else{
                if(strlen($tx) == 10){
                    User::where('id',$user->id)->update([
                        'step'=>6,
                        'happy'=>$tx,
                    ]);
                    $data = [];
                    $data[] = [['text' => "Instagram", 'callback_data' => "instagram"],];
                    $data[] = [['text' => "Tik tok", 'callback_data' => "tiktok"],];
                    $data[] = [['text' => "Telegram", 'callback_data' => "telegram"],];
                    if($lang == 1)
                        $data[] = [['text' => "Do'stimdan", 'callback_data' => "dostim"],];
                    else if($lang == 2)
                        $data[] = [['text' => "Дўстимдан", 'callback_data' => "dostim"],];
                    else if($lang == 3)
                        $data[] = [['text' => "От друга", 'callback_data' => "dostim"],];

                    $page = array("inline_keyboard" => $data,);
                    $page = json_encode($page,true);

                    if($lang == 1)
                        $this->bot('sendMessage',[
                            'chat_id'=>$cid,
                            'text'=>'"I\'m" kompaniyasi haqida qayerdan habar topdingiz ?',
                            'parse_mode'=>'HTML',
                            'reply_markup'=>$page
                        ]);
                    else if($lang == 2)
                        $this->bot('sendMessage',[
                            'chat_id'=>$cid,
                            'text'=>'"I\'m" компанияси ҳақида қаердан ҳабар топдингиз ?',
                            'parse_mode'=>'HTML',
                            'reply_markup'=>$page
                        ]);
                    else if($lang == 3)
                        $this->bot('sendMessage',[
                            'chat_id'=>$cid,
                            'text'=>'"I\'m" Откуда вы узнали о компании ?',
                            'parse_mode'=>'HTML',
                            'reply_markup'=>$page
                        ]);
                }else{
                    if($lang == 1)
                        $this->bot('sendMessage',[
                            'chat_id'=>$cid,
                            'text'=>"Tavallud kuningizni xato formatda kiritdingiz. Iltimos, tekshirib qayta kiriting.",
                            'parse_mode'=>'HTML',
                        ]);
                    else if($lang == 2)
                        $this->bot('sendMessage',[
                            'chat_id'=>$cid,
                            'text'=>"Таваллуд кунингизни хато форматда киритдингиз. Илтимос, текшириб қайта киритинг.",
                            'parse_mode'=>'HTML',
                        ]);
                    else if($lang == 3)
                        $this->bot('sendMessage',[
                            'chat_id'=>$cid,
                            'text'=>"Вы ввели свой день рождения в неправильном формате. Пожалуйста, проверьте и введите снова.",
                            'parse_mode'=>'HTML',
                        ]);
                }
            }
        }else if($step == 6){
            if($tx == "🔙 orqaga" or $tx == "🔙 орқага" or $tx == "🔙 назад"){
                User::where('id',$user->id)->update([
                    'step'=>5,
                ]);
                if($lang == 1){
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>"Tavallud kuningiz bilan qachon tabriklashimiz mumkin ? 01.12.2000 ko'rinishida kiriting.",
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$back_uz
                    ]);
                }else if($lang == 2){
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>"Таваллуд кунингиз билан қачон табриклашимиз мумкин ? 01.12.2000 кўринишида киритинг.",
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$back_uzb
                    ]);
                }else{
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>"Когда можно поздравить тебя с днем рождения ? 01.12.2000 в представлении.",
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$back_ru
                    ]);
                }
            }else{
                User::where('id',$user->id)->update([
                    'from'=>$tx,
                    'step'=>7,
                ]);
                $this->bot('deleteMessage',
                    ['chat_id'=>$cid,'message_id'=>$mid,]
                );

                if($lang == 1){
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>"id raqamni kiriting.",
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$back_social_uz
                    ]);
                }else if($lang == 2){
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>"ид рақамни киритинг.",
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$back_social_uzb
                    ]);
                }else{
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>"Введите идентификационный номер.",
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$back_social_ru
                    ]);
                }
            }
        }else if($step == 7){
            if($tx == "🔙 orqaga" or $tx == "🔙 орқага" or $tx == "🔙 назад"){
                User::where('id',$user->id)->update([
                    'step'=>6,
                ]);
                $data = [];
                $data[] = [['text' => "Instagram", 'callback_data' => "instagram"],];
                $data[] = [['text' => "Tik tok", 'callback_data' => "tiktok"],];
                $data[] = [['text' => "Telegram", 'callback_data' => "telegram"],];
                if($lang == 1)
                    $data[] = [['text' => "Do'stimdan", 'callback_data' => "dostim"],];
                else if($lang == 2)
                    $data[] = [['text' => "Дўстимдан", 'callback_data' => "dostim"],];
                else if($lang == 3)
                    $data[] = [['text' => "От друга", 'callback_data' => "dostim"],];

                $page = array("inline_keyboard" => $data,);
                $page = json_encode($page,true);

                if($lang == 1)
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>'"I\'m" kompaniyasi haqida qayerdan habar topdingiz ?',
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$page
                    ]);
                else if($lang == 2)
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>'"I\'m" компанияси ҳақида қаердан ҳабар топдингиз ?',
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$page
                    ]);
                else if($lang == 3)
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>'"I\'m" Откуда вы узнали о компании ?',
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$page
                    ]);
            }else{
                User::where('id',$user->id)->update([
                    'from_id'=>$tx,
                    'step'=>0,
                ]);
                $text = "Yangi foydalanuvchi:\n\n";
                $text .= "F.I: ".$user->full_name."\n";
                $text .= "ID: ".$user->id."\n";
                $text .= "Telefon raqam: ".$user->phone."\n";
                $text .= "Telegram: <a href='tg://user?id=".$user->chat_id."'>".$user->name."</a> (@".$user->username.")\n";

                if($lang == 1){
                    $text .= "Til: O'zbekcha\n";
                }else if($lang == 2){
                    $text .= "Til: Ўзбекча\n";
                }else if($lang == 3){
                    $text .= "Til: Руский язык\n";
                }
                $text .= "Аgend ID: ".$tx."\n";
                $text .= "Qayerdan kelgan: ".$user->from."\n";
                $text .= "Tug'ilgan sana: ".$user->happy."\n";
                $text .= "Ro'yxatdan o'tgan sana: ".date("Y-m-d H:i:s", strtotime($user->created_at))."\n";
                $text .= "Oxirgi so'rov vaqti: ".date("Y-m-d H:i:s", strtotime($user->updated_at))."\n";
                $this->bot('sendMessage',[
                    'chat_id'=>$group,
                    'text'=>$text,
                    'parse_mode'=>'HTML',
                ]);
                if($lang == 1){
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>"Kerakli menyuni tanlang:",
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$main_uz
                    ]);
                }else if($lang == 2){
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>"Керакли менюни танланг:",
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$main_uzb
                    ]);
                }else{
                    $this->bot('sendMessage',[
                        'chat_id'=>$cid,
                        'text'=>"Выберите нужное меню:",
                        'parse_mode'=>'HTML',
                        'reply_markup'=>$main_ru
                    ]);
                }
            }
        }

    }

    public function package($id,$method){
        $package = Package::where('id',$id)->first();
        $orders = Order::where('package_id',$package->id)->get();
        $user = User::where('id',$package->user_id)->first();
        $lang = $user->lang;
        $text = "<b>Buyurtma raqami: </b>#".$package->id."\n";
        $text .= "<b>Maxsulotlar:</b>\n";
        $total = 0;
        $i=1;
        foreach($orders as $order){
            $product = Product::where('id',$order->product_id)->first();
            $text .= $i++.". ".$product->name_uz." ".$order->count." x ".$product->price." = ".number_format($product->price*$order->count)."\n";
            $total = $product->price*$order->count;
        }
        $text .= "\n";
        $text .= "<b>Umumiy narx: </b>".number_format($total)."\n";
        $text .= "<b>Telefon:</b> ".$user->phone."\n";
        $text .= "<b>Telegram:</b> <a href='tg://user?id=".$user->chat_id."'>".$user->name."</a> (@".$user->username.")\n";
        if($lang == 1){
            $text .= "<b>Til:</b> O'zbekcha\n";
        }else if($lang == 2){
            $text .= "<b>Til:</b> Ўзбекча\n";
        }else if($lang == 3){
            $text .= "<b>Til:</b> Руский язык\n";
        }
        $text .= "<b>Аgend ID:</b> ".$user->from_id."\n";
        $text .= "<b>Qayerdan kelgan:</b> ".$user->from."\n";
        $text .= "<b>Address:</b> ".$package->address."\n\n";
        $text .= "<b>Amallar:</b>\n";

        if(!empty($package->operator_id)){
            $operator = User::where('id',$package->operator_id)->first();
            $text .= "------------------\n";
            $text .= "Operator: ".$operator->name."\n";
            $text .= "Vaqti: ".$package->operator_date."\n";
            $text .= "Comment: ".$package->operator_comment."\n";
        }

        if(!empty($package->storage_id)){
            $storage = User::where('id',$package->storage_id)->first();
            $text .= "------------------\n";
            $text .= "Omborchi: ".$operator->name."\n";
            $text .= "Vaqti: ".$package->operator_date."\n";
        }

        if(!empty($package->supplier_id)){
            $supplier = User::where('id',$package->supplier_id)->first();
            $text .= "------------------\n";
            $text .= "Yetqazuvchi: ".$operator->name."\n";
            $text .= "Oldi: ".$package->supplier_date."\n";
            $text .= "Yetqazdi: ".$package->supplier_done_date."\n";
        }

        if(!empty($package->die_id)){
            $die = User::where('id',$package->die_id)->first();
            $text .= "------------------\n";
            $text .= "Bekor qildi: ".$die->name."\n";
            $text .= "Vaqti: ".$package->die_date."\n";
            $text .= "Xodim: ".$package->die_person;
            $text .= "❌ Mahsulot bekor qilindi.";
        }

        if($method == "tasdiqlash_operator"){
            $data = [];
            $data[] = [['text' => "📦 Omborchiga", 'callback_data' => "operator_tasdiq_2 ".$package->id],];
            $data[] = [['text' => "❌ Bekor qilish", 'callback_data' => "operator_bekor_qilish ".$package->id],];
            $page = array("inline_keyboard" => $data,);
            $page = json_encode($page,true);
        }

        if($method == "operator_tasdiq_2"){
            $data = [];
            $data[] = [['text' => "✅ Tayyor", 'callback_data' => "omborchi_tasdiq ".$package->id],];
            $data[] = [['text' => "❌ Bekor qilish", 'callback_data' => "omborchi_bekor_qilish ".$package->id],];
            $page = array("inline_keyboard" => $data,);
            $page = json_encode($page,true);
        }

        if($method == "omborchi_tasdiq"){
            $data = [];
            $data[] = [['text' => "🚚 Mahsulotni yetqazish", 'callback_data' => "yetqazuvchi_tasdiq ".$package->id],];
            $data[] = [['text' => "❌ Bekor qilish", 'callback_data' => "yetqazuvchi_bekor_qilish ".$package->id],];
            $page = array("inline_keyboard" => $data,);
            $page = json_encode($page,true);
        }

        if($method == "yetqazuvchi_tasdiq"){
            $data = [];
            $data[] = [['text' => "🤝 Mahsulot yetqazildi", 'callback_data' => "yetqazuvchi_confirm ".$package->id],];
            $data[] = [['text' => "❌ Bekor qilish", 'callback_data' => "yetqazuvchi_bekor_qilish ".$package->id],];
            $page = array("inline_keyboard" => $data,);
            $page = json_encode($page,true);
        }

        if($method == "yetqazuvchi_confirm"){
            $page = "";
            $text .= "\n\n";
            $text .= "✅ Mahsulot yetqazildi";
        }

        if($method == "operator_bekor_qilish" or $method == "omborchi_bekor_qilish" or $method == "yetqazuvchi_bekor_qilish"){
            $page = "";
            $text .= "\n\n";
            $text .= "❌ Mahsulot bekor qilindi.";
        }

        return [
            'text' => $text,
            'page' => $page,
        ];
    }

    public function bot($method,$datas=[]){

        $api_key = "5374147157:AAFiJ97VMoto3EDXjRTrNySWmTzceTzrDyI";
        $url = "https://api.telegram.org/bot".$api_key."/".$method;
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        $res = curl_exec($ch);
        if(curl_error($ch)){
            var_dump(curl_error($ch));
        }else{
            return json_decode($res);
        }
    }

}
