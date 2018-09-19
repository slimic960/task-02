<?php

class Model_Main extends Model {

    public function run() {
        $db = new Database;
        $quryStartNum = $this->numPage();
        $result = $db->prepare("SELECT `tittle`, `image`, `description`, `name`, `datetimes`  FROM `blog_news` "
                . "INNER JOIN users ON users.id=blog_news.user_id order by `datetimes` DESC $quryStartNum");
        $result->execute();
        if ($result->rowCount() > 0) {
            while ($row = $result->fetchAll(PDO::FETCH_ASSOC)) {
                return $row;
            }
        } else {
            echo 'Новости не найдены';
        }
    }

    public function numPage() {

        $page = $_POST["page"];
        $db = new Database;
        $num = 2; //сколько выводить

        $count = $db->prepare("SELECT COUNT(*) FROM blog_news");
        $count->execute();
        $temp = $count->fetchColumn();

        if ($temp > 0) {
            $tempcount = $temp;

            //общее число страниц
            $total = (($tempcount - 1) / $num) + 1;
            $total = intval($total);

            $page = intval($page);

            if (empty($page) or $page < 0)
                $page = 1;

            if ($page > $total) {
                exit();         
            }
            $start = $page * $num - $num;

            return " LIMIT $start, $num";
        }
    }

}
