<?php

// Check if comments are allowed for the current post.
// comments_open() returns true if the post type and post allow comments.
if (comments_open()) :
?>
    <div id="comments" class="contact-form-box mb-50">
        <?php
        // Display the comments list only if there are comments.
        // have_comments() checks if the current post has comments.
        if (have_comments()) :
        ?>
            <div class="postbox-comment mb-60">
                <h3 class="postbox-comment-title mb-40">
                    <?php
                    // Get the number of comments for the current post.
                    $comment_count = get_comments_number();
                    // Echo the comment count and a properly pluralized "Comment"/"Comments".
                    // esc_html() escapes the number for safe output.
                    // _n() returns singular or plural translation based on count.
                    echo esc_html($comment_count) . ' ' . _n('Comment', 'Comments', $comment_count, 'curamedix');
                    ?>
                </h3>
                <ul>
                    <?php
                    // List the comments.
                    // wp_list_comments() outputs each comment using the provided args.
                    // 'style' => 'ul' tells WP to expect <li> elements (we use <ul> above).
                    // 'short_ping' => true shortens pingback/trackback output.
                    // 'callback' => 'custom_comment_list' sets a custom function to render each comment.
                    wp_list_comments(array(
                        'style'       => 'ul',
                        'short_ping'  => true,
                        'callback'    => 'custom_comment_list'
                    ));
                    ?>
                </ul>
            </div>


        <?php
            // Display comment pagination (if there are enough comments to paginate).
            // the_comments_pagination() outputs previous/next links.
            the_comments_pagination(array(
                'prev_text' => esc_html__('Previous', 'curamedix'),
                'next_text' => esc_html__('Next', 'curamedix'),
            ));
        endif;

        // Prepare a CSS class depending on whether the user is logged in.
        // is_user_logged_in() returns true when a user is authenticated.
        if (is_user_logged_in()) {
            $cl = 'loginformuser'; // class added to comment textarea wrapper for logged in users
        } else {
            $cl = ''; // no extra class for anonymous visitors
        }

        // Get previously entered commenter data from cookies (name, email, url).
        // Returns an array with keys 'comment_author', 'comment_author_email', 'comment_author_url'.
        $commenter = wp_get_current_commenter();

        // Determine whether name and email are required for commenting.
        // get_option('require_name_email') returns true/false based on WP setting.
        $req = get_option('require_name_email');

        // Build the custom fields array for comment_form().
        // Each field contains HTML for the input and should include proper escaping.
        $fields = array(
            // Author/name input field. We open wrapper markup for layout.
            'author' => '<div class="row"><div class="col-xl-6"><div class="postbox-details-input-box"><div class="postbox-details-input mb-20"><input type="text" name="author" id="author" placeholder="' . esc_attr__('Your name', 'curamedix') . '" value="' . esc_attr($commenter['comment_author']) . '" ' . ($req ? 'required' : '') . '>
            </div></div></div>',

            // Email input field. Contains column wrapper and escapes saved value.
            'email' => '<div class="col-xl-6"><div class="postbox-details-input-box"><div class="postbox-details-input mb-20">
               <input type="email" name="email" id="email" placeholder="' . esc_attr__('Your email', 'curamedix') . '" value="' . esc_attr($commenter['comment_author_email']) . '" ' . ($req ? 'required' : '') . '>
         </div></div></div>',

            // URL/website input field. Escapes saved value and closes the row wrapper.
            'url' => '<div class="col-xl-12">
                  <div class="postbox-details-input-box">
                     <div class="postbox-details-input mb-20">
               <input type="text" name="url" id="url" placeholder="' . esc_attr__('Your website', 'curamedix') . '" value="' . esc_attr($commenter['comment_author_url']) . '">
         </div></div></div></div>',
        );


        // Prepare the defaults array for comment_form().
        // This configures the comment textarea, submit button and cookie consent markup.
        $defaults = [
            // 'fields' overrides the default author/email/url fields.
            'fields'             => $fields,

            // 'comment_field' is the main textarea for the comment content.
            // We add the $cl class here so the textarea wrapper varies for logged-in users.
            'comment_field' => '<div class="col-xxl-12 ' . $cl . '"><div class="postbox-details-input-box">
                     <div class="postbox-details-input mb-20">
                       <textarea id="comment" name="comment" placeholder="' . esc_attr__('Your Comment Here...', 'curamedix') . '" required></textarea>
                </div></div></div>
            ',

            // 'submit_button' overrides the HTML for the submit button.
            // Use a markup that fits the theme styles.
            'submit_button' => '<div class="col-12"><div class="postbox-details-input-box">
                                    <button type="submit" class="tr-btn d-inline-block">
                                    <span data-text="' . esc_attr__('Send Message', 'curamedix') . '">' . esc_html__('Post Comment', 'curamedix') . '</span>
                                    </button>
                                </div></div>',

            // 'cookies' is custom markup for the comment cookie opt-in checkbox.
            // This pair of input+label mimics WP core cookie consent but with theme markup.
            'cookies' => '<div class="col-xxl-12">
                <div class="postbox__comment-agree d-flex align-items-start mb-25">' .
                '<input class="e-check-input" type="checkbox" id="e-agree" name="wp-comment-agree" value="1" checked>' .
                '<label class="e-check-label" for="e-agree">' . esc_html__('Save my name, email, and website in this browser for the next time I comment.', 'curamedix') . '</label></div>
            </div>'
        ];
        // Output the comment form with our customized fields and markup.
        // comment_form() echoes the HTML; it accepts an array of arguments.
        comment_form($defaults);
        ?>
    </div><!-- .comments-area -->
<?php endif; ?>


<?php
// Move the comment textarea to the bottom of the fields list.
// WordPress by default may output the comment textarea before some fields.
// This filter ensures the 'comment' field is last in the order.
function move_comment_textarea_to_bottom($fields)
{
    // Save the comment field HTML for reassigning later.
    $comment_field = $fields['comment'];
    // Remove the comment field from the array so it can be appended at the end.
    unset($fields['comment']);
    // Re-add the comment field so it becomes the last element in the array.
    $fields['comment'] = $comment_field;

    // Return the reordered fields to WP.
    return $fields;
}

// Attach the function to the 'comment_form_fields' filter so it runs when WP builds the form.
// Using default priority (10) and one argument.
add_filter('comment_form_fields', 'move_comment_textarea_to_bottom');
// comments for end 


// custom_comment_list
// Custom callback function used by wp_list_comments() to render each comment.
// Parameters:
//   $comment - WP_Comment object for the current comment.
//   $args    - Arguments passed to wp_list_comments().
//   $depth   - Current depth (nesting level) of the comment.
function custom_comment_list($comment, $args, $depth)
{
    // Make the current comment available globally so WP template tags work.
    $GLOBALS['comment'] = $comment;

    // Check if the comment is a pingback or trackback.
    if ($comment->comment_type == 'pingback' || $comment->comment_type == 'trackback') {
        // Display pingbacks/trackbacks in a simplified way.
?>
        <li class="pingback">
            <p><?php esc_html_e('Pingback:', 'curamedix'); ?> <?php comment_author_link(); ?></p>
        </li>
    <?php
    } else {
        // Regular comments (not pingbacks/trackbacks).
    ?>
        <li <?php comment_class('comment'); ?> id="comment-<?php comment_ID(); ?>">
            <?php
            // comment_class() prints CSS classes for the <li>.
            // comment_ID() prints the comment ID attribute.
            ?>
            <div class="postbox-comment-box">
                <div class="postbox-comment-info ">
                    <div class="postbox-comment-avater mr-20">
                        <?php
                        // Output the avatar for the comment author.
                        // get_avatar() returns an <img> tag for the user's Gravatar (size 50).
                        echo get_avatar($comment, 50);
                        ?>
                    </div>
                </div>
                <div class="postbox-comment-text">
                    <div class="postbox-comment-name">
                        <?php
                        // comment_author() echoes the comment author's name (linked if URL present).
                        ?>
                        <h5><?php comment_author(); ?></h5>
                        <?php
                        // comment_date() echoes the comment's date.
                        // This is inside a <span> with class "post-meta".
                        ?>
                        <span class="post-meta"> <?php comment_date(); ?></span>
                    </div>
                    <?php
                    // comment_text() outputs the comment content (with allowed formatting).
                    ?>
                    <p><?php comment_text(); ?></p>
                    <div class="postbox-comment-reply">
                        <?php
                        // comment_reply_link() outputs a reply link for threaded comments.
                        // array_merge() ensures we pass current args plus depth and max_depth.
                        echo comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'])));
                        ?>
                    </div>
                </div>
            </div>
            <!-- Don't close li -->
            <?php
            // Note: we intentionally don't output a closing </li> here because WP will handle it
            // or because the callback expects the closing tag to be printed outside (depending on style).
            // When using 'style' => 'ul', WP wraps each comment in <li> ... </li>.
            ?>
    <?php
    }
}
