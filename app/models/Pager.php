<?php

//pagination class

class Pager
{
    protected $limit = 10;
    public $offset = 0;

    public function __construct($limit = 10) {
        $this->limit = (int)$limit;
        $page_number = $this->get_page_number();
        $this->offset = ($page_number - 1) * $this->limit;
    }

    protected function get_page_number() {
        $page_number = $_GET['page'] ?? 1;

        if($page_number < 1) {
            $page_number = 1;
        }
        $page_number = (int)$page_number;

        return $page_number;
    }

    protected function create_page_link($page) {
        //reconstruct url
        $url = 'index.php?';
        $url2 = '';

        foreach ($_GET as $key => $value) {
            if($key == 'page'){
                $url2 .= "&" . $key . "=$page";
            }else{
                $url2 .= "&" . $key . "=" . $value;
            }
        }

        $url2 = trim($url2, '&');
        if(!strstr($url2, 'page=')){
            $url2 .= "&page=$page";
        }
        $url .= $url2;

        return $url;
    }

    public function display() {
    ?>
            <div>
                <nav aria-label="...">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="<?=$this->create_page_link(1);?>">First</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="<?=$this->create_page_link(($this->get_page_number() - 1) < 1 ? 1 : $this->get_page_number() - 1);?>">Prev</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item active" aria-current="page">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="<?=$this->create_page_link($this->get_page_number() + 1);?>">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
    <?php
    }
}