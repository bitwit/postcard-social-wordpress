<?php
    if( isset($_POST['postcard_id']) ):
        $result = postcard_delete_by_id($_POST['postcard_id']);
        ?>
        <div id="message" class="updated below-h2">
            <?php if($result): ?>
                <p>Deleted postcard successfully</p>
            <?php else: ?>
                <p>Couldn't delete postcard</p>
            <?php endif; ?>
        </div>
        <?php
    endif;
?>

<style>
    div.postcard-listing {
        border: 1px solid #ABABAB;
        background: #EFEFEF;
        margin: 10px;
        padding: 10px;
        font-weight: lighter;
        font-size: 18px;
    }

    dt {
        font-weight: bold;
        margin: 20px 0 10px 0;
    }

    img.postcard-image {
        max-width: 480px;
    }

    ol.postcard-options {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    button.postcard-delete {
        border: none;
        border-radius: 4px;
        background-color: #ff6437;
        color: #ffffff;
        padding: 12px;
        cursor: pointer;
    }

    button:hover {
        opacity: 0.9;
    }

    button:active {
        opacity: 0.8;
    }

</style>
<h2>Postcard Listings</h2>
<div class="postcard-listings">
    <?php
    $collection = postcard_get_collection(array("limit" => 50));
    foreach ($collection as $postcard):
        ?>
        <div class="postcard-listing">
            <ol class="postcard-options">
                <li>
                    <form METHOD="post">
                        <input type="hidden" name="postcard_id" value="<?php echo $postcard->id; ?>" />
                        <button class="postcard-delete">Delete</button>
                    </form>
                </li>
            </ol>
            <dl>
                <dt>Posted By</dt>
                <dd><?php echo get_the_author_meta("display_name", $postcard->user_id); ?></dd>

                <dt>Date</dt>
                <dd><?php echo $postcard->date; ?></dd>

                <?php if ($postcard->message): ?>
                    <dt>Message</dt>
                    <dd><?php echo $postcard->message; ?></dd>
                <?php endif; ?>

                <?php if ($postcard->url): ?>
                    <dt>Url</dt>
                    <dd><?php echo $postcard->url; ?></dd>
                <?php endif; ?>

                <?php if ($postcard->image): ?>
                    <dt>Image</dt>
                    <dd><img class="postcard-image" src="<?php echo $postcard->image; ?>"/></dd>
                <?php endif; ?>

                <?php if ($postcard->video): ?>
                    <dt>Video</dt>
                    <dd><?php echo $postcard->video; ?></dd>
                <?php endif; ?>


                <?php
                    $tags = postcard_get_tags_for_id($postcard->id);
                    if(count($tags) > 0):
                ?>
                    <dt>Tags</dt>
                    <dd><?php
                        echo implode(", ", $tags);
                        ?>
                    </dd>
                <?php
                    endif;
                ?>

            </dl>
        </div>
    <?php
    endforeach;
    ?>
</div>
<?php
