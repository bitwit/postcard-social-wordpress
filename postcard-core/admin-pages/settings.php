<?php
if (isset($_POST['postcard_auto_post'])) {
    update_option('postcard_auto_post', $_POST['postcard_auto_post']);
    ?>
    <div id="message" class="updated below-h2">
        <p>Updated Auto-Post settings</p>
    </div>
<?php
}

if (isset($_POST['postcard_auto_post_title'])) {
    update_option('postcard_auto_post_title', $_POST['postcard_auto_post_title']);
    ?>
    <div id="message" class="updated below-h2">
        <p>Updated Auto-Post title settings</p>
    </div>
<?php
}

if (isset($_POST['postcard_auto_post_tag'])) {
    update_option('postcard_auto_post_tag', $_POST['postcard_auto_post_tag']);
    ?>
    <div id="message" class="updated below-h2">
        <p>Updated Auto-Post tag settings</p>
    </div>
<?php
}

if (isset($_POST['postcard_auto_post_image_feature'])) {
    update_option('postcard_auto_post_image_feature', $_POST['postcard_auto_post_image_feature']);
    ?>
    <div id="message" class="updated below-h2">
        <p>Updated Auto-Post image settings</p>
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

        .postcard-intro {
            clear: both;
            margin: 10px 0;
            font-size: 18px;
            line-height: 21px;
        }

        #postcard-options-form {
            width: 700px;
        }

        .postcard-primary-options {
            clear: both;
        }

        .postcard-primary-option {
            float: left;
            margin: 2%;
            padding: 2%;
            width: 40%;
            cursor: pointer;
            overflow: hidden;
            background-color: #efefef;
            border: 1px solid #656565;
        }

        .postcard-primary-option:hover {
            background-color: #dedede;
        }

        .postcard-primary-option input {
            float: left;
        }

        .postcard-primary-option p {
            float: left;
            font-size: 20px;
            line-height: 24px;
        }

        #postcard-core-features {
            clear: both;
            float: left;
            width: 40%;
            margin: 0 5%;
        }

        #postcard-post-options {
            display: none;
            float: right;
            width: 40%;
            margin: 0 5%;
        }

        .postcard-post-option input {
            clear: left;
        }

    </style>
    <script>
        jQuery(document).ready(function () {
            //Setup
            evaluatePrimaryOption();
            //Events
            jQuery("div.postcard-primary-option").on("click", function () {
                jQuery(this).find('input[type="radio"]').prop('checked', true);
                evaluatePrimaryOption();
            });

        });
        function evaluatePrimaryOption() {
            var autoPost = jQuery("input:radio[name ='postcard_auto_post']:checked").val();
            console.log("auto Post?", autoPost);
            if (autoPost == 1) {
                jQuery("#postcard-post-options").show();
            } else {
                jQuery("#postcard-post-options").hide();
            }
        }
    </script>
    <div>
        <h2>Settings</h2>

        <form id="postcard-options-form" method="post">
            <button class="postcard-save">Save</button>

            <div class="postcard-intro">
                <h4>The Postcard social plugin gives you the option to integrate in two key ways:</h4>
                <ul style="list-style-type: circle; padding-left: 20px;">
                    <li>Treat your social content like a separate feed or 'micro-blog' in supplement to standard
                        WordPress
                        posts.
                    </li>
                    <li>Treat social content like it <strong>IS</strong> a standard WordPress post.</li>
                </ul>
            </div>

            <!-- Primary Option -->
            <?php $shouldPost = get_option("postcard_auto_post"); ?>
            <div class="postcard-primary-options">
                <div class="postcard-primary-option">
                    <input type="radio" name="postcard_auto_post" value="0"<?php if (!$shouldPost) echo " checked"; ?>/>

                    <p>I want social content to be handled separately <strong>(default)</strong></p>
                </div>
                <div class="postcard-primary-option">
                    <input type="radio" name="postcard_auto_post" value="1"<?php if ($shouldPost) echo " checked"; ?>/>

                    <p>I want social content to create new WordPress Posts</p>
                </div>
            </div>

            <div id="postcard-core-features">
                <h3>Core Features</h3>

                <p>No matter how you choose to use Postcard, these features are always available:</p>
                <h4>Shortcodes</h4>
                <dl>
                    <dt>
                        [postcard-feed]
                    </dt>
                    <dd>
                        This shortcode will create feed of content that is filterable via attributes such as:
                        <br/>
                        <strong>[postcard-feed tags="interesting,useful"]</strong>
                    </dd>
                    <dt>
                        [postcard-gallery]
                    </dt>
                    <dd>
                        This shortcode will create an image gallery and only display image and video content and is
                        filterable via
                        attributes such as:
                        <br/>
                        <strong>[postcard-gallery count=20]</strong>
                    </dd>
                    <dt>
                        [postcard-archive]
                    </dt>
                    <dd>
                        This shortcode will create a feed of content that is queryable using url (a.k.a. GET) parameters
                        such as
                        ?tags=interesting
                        <br/>
                        When you first install Postcard a page is created with this shortcode and used as your permalink
                        url for all
                        future
                        shared content, should you choose to host picture/video content when sharing to other networks
                    </dd>
                </dl>
                <h4>Behaviours</h4>
                <dl>
                    <dt>#profile</dt>
                    <dd>
                        If you tag a photo upload with #profile or privataely tag it with 'profile' this will become
                        your effective
                        new 'profile picture'
                        that is used in the gallery overlay
                    </dd>
                </dl>
            </div>
            <!-- Auto Post Options -->
            <div id="postcard-post-options">
                <h3>Auto-post options</h3>

                <div class="postcard-post-option">
                    <?php $postTitle = get_option("postcard_auto_post_title"); ?>
                    <h4>Title Posts as:</h4>
                    <input type="radio" name="postcard_auto_post_title"
                           value="0"<?php if (!$postTitle) echo " checked"; ?>/>
                    <label>The first line of the message (max ~100 chars)</label>
                    <br/>
                    <input type="radio" name="postcard_auto_post_title"
                           value="1"<?php if ($postTitle) echo " checked"; ?>/>
                    <label>"Status Update - " &amp; the date</label>
                </div>
                <div class="postcard-post-option">
                    <?php $postTag = get_option("postcard_auto_post_tag"); ?>
                    <h4>Treat private tags &amp; #hashtags from the app as:</h4>
                    <input type="radio" name="postcard_auto_post_tag"
                           value="0"<?php if (!$postTag) echo " checked"; ?>/>
                    <label>Tags for the post</label>
                    <br/>
                    <input type="radio" name="postcard_auto_post_tag"
                           value="1"<?php if ($postTag == 1) echo " checked"; ?>/>
                    <label>Categories for the post</label>
                    <br/>
                    <input type="radio" name="postcard_auto_post_tag"
                           value="2"<?php if ($postTag == 2) echo " checked"; ?>/>
                    <label>Private tags as categories &amp; #hashtags as tags</label>
                    <br/>
                    <input type="radio" name="postcard_auto_post_tag"
                           value="3"<?php if ($postTag == 3) echo " checked"; ?>/>
                    <label>Do not tag or categorize the post</label>
                </div>
                <div class="postcard-post-option">
                    <?php $postImage = get_option("postcard_auto_post_image_feature"); ?>
                    <h4>Set the image of photo/video posts as the feature image:</h4>
                    <input type="radio" name="postcard_auto_post_image_feature"
                           value="0"<?php if (!$postImage) echo " checked"; ?>/>
                    <label>On</label>
                    <br/>
                    <input type="radio" name="postcard_auto_post_image_feature"
                           value="1"<?php if ($postImage) echo " checked"; ?>/>
                    <label>Off</label>
                </div>
            </div>

        </form>
    </div>
<?php
