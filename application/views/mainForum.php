<style>
.card-text,.card-title{
    padding-left:2%;
}

.col-lg-9{
    padding-left:0;
    padding-right:0;
}

:root {
   --ggs: 3;
}

.table-active, .table-active>th, .table-active>td {
    background-color: rgba(0,0,0,0.06);
}

.card{
    margin-bottom:2em;
}

.jumbotron{
    margin:2em;

}
</style>
<?php
echo '<div class="jumbotron jumbotron-fluid">';
    echo '<div class="container bg-transparent">';
      echo'<h1 class="title display-3 text-center" style="font-weight:100;">GAME<strong style="font-weight:600;">BIT</strong></h1>';
    echo'</div>';
echo'</div>';
$j = 0;
foreach ($threads as $thread)
{
    $i = 1;
    echo '<div class="container-fluid col-lg-12">';
    echo '<div class="card bg-secondary  col-lg-9">';
    echo '<div class="card-header bg-info ">'."<h3><b>".$Categories[$j]->CategoryName."</h3></b>".'</div>';
    foreach($thread as $threadData)
    {  
        if ($i % 2 == 0)
        {
         echo '<div class="card-body"> ';
         echo '<a href="'.base_url().'Posts/'.$threadData['threadID'].'"'.'><h4 class="card-title text-info"><strong>'.$threadData['threadName'].'</a></strong> <span class="float-right text-secondary"><b>'.$threadData['postCount'].'</b> Posts </h4> ';
          echo ' <p class="card-text">'.$threadData['threadDescription'].'</p>';
          echo ' </div>';
        }
        else {
           echo '<div class="card-body table-active">';
           echo '<a href="'.base_url().'Posts/'.$threadData['threadID'].'"'.'><h4 class="card-title text-info"><strong>'.$threadData['threadName'].'</a></strong> <span class="float-right text-secondary"><b>'.$threadData['postCount'].'</b> Posts </h4>';
           echo ' <p class="card-text">'.$threadData['threadDescription'].'</p>';
           echo ' </div>';
        }
        $i++;
    }
    $j++;
    echo ' </div>';
    echo '</div>';
}
?>










