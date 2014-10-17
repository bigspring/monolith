<?php
// Topmost parent & descendant content functions
/**
 * Returns true if the supplied page ID is related to the current post, including if it is the current page, the parent, or the topmost parent
 * @param $page_id
 * @return bool
 */
function is_related($page_id) {
    global $post;

    if(is_page() && ($post->ID == $page_id || $post->post_parent==$page_id || get_topmost_parent_id() == $page_id)) {
        return true;
    } else {
        return false;
    }
}

/**
 * Returns true if the supplied page ID is the direct child, or a descendant of the current page
 * @param $page_id
 * @return bool
 */
function is_descendant($page_id) {
    global $post;

    if(is_page() && ($post->post_parent==$page_id || get_topmost_parent_id() == $page_id)) {
        return true;
    } else {
        return false;
    }
}