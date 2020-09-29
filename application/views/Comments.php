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
    margin-bottom:4em;
}

.jumbotron{
    margin:2em;

}
</style>

<div class="jumbotron jumbotron-fluid">
<div class="container bg-transparent">
<h1 class="title display-3 text-center" style="font-weight:100;">GAME<strong style="font-weight:600;">BIT</strong></h1>
    </div>
</div>



<div class="container-fluid col-lg-12">
<div class="card bg-secondary  col-lg-9">

<div class="card-header bg-info "><h3><b>
<span class ="float-right"><a href="<?php echo base_url()."Comments/submitComment/$post->postID"?>" class="btn btn-primary">Submit Comment!</a></button> </span>
<?php echo $post->postTitle ?></h3></b>
<p><?php echo $user->userName ?></p>
</div>
<div class="card-body">
<a href="'.base_url().'Posts/'.$threadData['threadID'].'"><h4 class="card-title text-info"><strong></a></strong> <b></b>  </h4> 
 <p class="card-text"><?php echo $post->postContent ?></p>
 </div>
 </div>
</div>


<?php
foreach($comments as $comment)
{
echo '<div class="container-fluid col-lg-12">';
 echo '<div class="card bg-secondary  col-lg-9">';
echo '<div class="card-header bg-info "><h3>'.$comment->userName.'<b></h3></b>';
echo '</div>';
echo '<div class="card-body">';
 echo '<p class="card-text">'.$comment->commentContent.'</p>';
echo '</div>';
echo '</div>';
echo '</div>';
}
?>










