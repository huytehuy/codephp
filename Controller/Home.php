<?php
// http://localhost/live/Home/Show/1/2

class Home extends Controller{

        // Must have SayHi()
        function Home_page($user){
            $cus = $this->model($user);
            $this->view("Home_page", [
                "user" => $user,
                "collection" => $cus->get_swiper_slide_collection(), //$data["collection"] = $cus->get_swiper_slide_collection() 
                "featured" => $cus->get_products()
            ]);
        }
        function About_us($user){
            $this->view("About_US", []);
        }
        function Products($user){
            $cus = $this->model($user);
            $this->view("Products", [
                "cate" => $cus->get_product_cates(),
                "product" => $cus->get_products()
            ]);
        }
        function Item($user, $pid){
            $cus = $this->model($user);
            $this->view("Item", [
                "product_id" => $cus->get_product_at_id($pid),
                "sub_img" => $cus->get_sub_img($pid)
            ]);
        }
        function Contact_us($user){
            $this->view("Contact_US", []);
        }
        function News($user){
            $cus = $this->model($user);
            $news = $cus->get_news();
            $news_list = array();
            foreach($news as $snews){
                array_push($news_list, ([
                    "id" => $snews["id"],
                    "cid" => $snews["cid"],
                    "key" => $snews["key"], 
                    "time" => $snews["time"],
                    "title" => $snews["title"],
                    "content" => $snews["content"],
                    "imgurl" => $snews["img_url"],
                    "shortcontent" => $snews["short_content"]]));
            }
            $this->view("News", [
                "news" => $news_list
            ]);
        }
        function Cost_table($user){
            $cus = $this->model($user);
            $combo = $cus->get_combo();
            $product_in_combo = array();
            foreach($combo as $cb){
                array_push($product_in_combo, (["name" => $cb["cbname"], "price" => $cb["cost"], "product" => $cus->get_product_in_combo($cb["id"])]));
            }
            $this->view("Cost_table", [
                "combo" => $product_in_combo,
                "cycle" => $cus->get_cycle()
            ]);
        }
        function Cart($user){
            if($user == "member"){
                $mem = $this->model("member");
                $id = (int)mysqli_fetch_array($mem->get_id_user("hieu.phamgc", "helloworld"), MYSQLI_NUM)[0];
                $this->view("Cart", [
                    "product_in_cart" => $mem-> get_product_in_cart((int)$id),
                    "user" => mysqli_fetch_array($mem->get_user((int)$id)),
                    "id" => $id
                ]);
            }
            else{
                $this->Login($user);
            }
        }
        function Login($user){
            $this->view("Login", []);
        }
        function Payment($user){
            if($user == "member"){
                $mem = $this->model("member");
                $id = (int)mysqli_fetch_array($mem->get_id_user("hieu.phamgc", "helloworld"), MYSQLI_NUM)[0];
                $this->view("Payment", [
                    "product_in_cart" => $mem-> get_product_in_cart((int)$id),
                    "user" => mysqli_fetch_array($mem->get_user((int)$id)),
                    "id" => $id
                ]);
            }
            else{
                $this->Login($user);
            }
        }
        function forgot($user){
            $this->view("forgot", []);
        }
        function register($user){
            $this->view("register", []);
        }
        function insert_message($user, $array){
            $this->model($user)->insert_message($array[2], $array[3], $array[4], $array[5], $array[6]);
        }
        function update_user($user, $array){
            $this->model($user)->update_user($array[2], $array[3], $array[4], $array[5]);
        }
        function delete_product_incart($user, $array){
            $this->model($user)->delete_product_incart((int)$array[2]);
        }
}
?>