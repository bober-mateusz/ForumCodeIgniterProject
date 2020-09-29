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
  
}

.card-body{
    padding:0.7rem;

}

.jumbotron{
    margin:2em;
}

</style> 

<div class="jumbotron">
<div class="container bg-transparent">
<h1 class="title display-3 text-center" style="font-weight:100;">GAME<strong style="font-weight:600;">BIT</strong></h1>
</div>
</div>

<div class="container-fluid col-lg-12">
<div class="card bg-secondary  col-lg-9">
<div class="card-header bg-info ">
    <?php
    echo $this->pagination->create_links();
    ?>
<span class ="float-right"><a href=<?php echo base_url().'Posts/'.'submitPost/'.$threadID?> class="btn btn-primary">Submit Post!</a></button> </span>
</div>

<?php
  $j = 0;
  foreach($posts as $post)
  {
    if ($j % 2 == 0)
    {
        echo '<div class="card-body">';
        echo '<a href="'.base_url().'Comments'."/$post->postID".'">'.$post->postTitle.'</a>';
        echo '<p class="card-text text-muted">BY '.$post->userName.'</p>';
        echo '</div>';
    }
    else 
    {
        echo '<div class="card-body table-active">' ;
        echo '<a href="'.base_url().'Comments'."/$post->postID".'">'.$post->postTitle.'</a>';
        echo '<p class="card-text text-muted"> BY '.$post->userName.'</span> </p>';
        echo '</div>';
    }
    $j++;
  }
?>















