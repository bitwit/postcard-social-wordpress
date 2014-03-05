<?php
if (isset($_POST['postcard_auto_post'])){
    update_option('postcard_auto_post', $_POST['postcard_auto_post']);
    ?>
    <div id="message" class="updated below-h2">
            <p>Updated settings</p>
    </div>
<?php
}
?>
<style>
        dl {
            clear: both;
            margin-top: 10px;
        }
        dt {
            font-weight: bold;
            margin: 20px 0 10px 0;
        }
        button.postcard-save {
            float: left;
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
        .postcard-edit-area input, .postcard-edit-area textarea {
            width: 85%;
        }
</style>
<div>
    <h2>Settings</h2>
    <form method="post">
        <input type="hidden" id="postcard-edit-id" name="postcard-edit-id"/>
        <dl class="margin-top: 20px;">
            <dt>Automatically create a new blog post when social content is submitted?</dt>
            <dd>
                <?php $shouldPost = get_option("postcard_auto_post"); ?>
                <input type="radio" name="postcard_auto_post" value="0"<?php if(!$shouldPost) echo " checked"; ?>> No<br>
                <input type="radio" name="postcard_auto_post" value="1"<?php if($shouldPost) echo " checked"; ?>> Yes<br>
            </dd>
        </dl>
        <button class="postcard-save">Save</button>
    </form>
</div>
<?php
