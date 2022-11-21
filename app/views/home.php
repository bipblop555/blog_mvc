
<div id="header">
    <span>BLOG</span>
    <span> <?= $_POST['username']?> </span>
</div>
<div id="wrapper">
    <button>Poster</button>
    <textarea name="post_content" id="post_content"></textarea>
</div>
<h2> 
    <?= $_POST['username']?> 
</h2


<?php

/** 
 * @var App\Entity\Post[] 
 * $posts 
*/

// foreach ($posts as $post)
// {
//     echo $post->getContent();
// }

