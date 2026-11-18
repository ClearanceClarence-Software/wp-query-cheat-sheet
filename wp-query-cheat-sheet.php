<?php
/**
 * WP_Query Cheat Sheet: every WP_Query parameter in one file.
 * Checked against WordPress 7.1. https://clearanceclarence-software.github.io/wp-query-cheat-sheet/
 *
 * Every top-level parameter with a sample value. This is a reference,
 * not a query to run as-is: many of these contradict each other.
 * Nested arrays are shown in full on the site.
 *
 * Inspired by wp-query-ref by luetkemj: https://github.com/luetkemj/wp-query-ref
 */

$args = array(

  // Author: Show posts by, or not by, certain authors.
  // https://developer.wordpress.org/reference/classes/wp_query/#author-parameters
  'author'         => '1,2,3', // (int|string) Author ID, or a comma-separated list of IDs. Prefix an ID with - to exclude it: '-1,-2'.
  'author_name'    => 'jane', // (string) The author's user_nicename, not their display name.
  'author__in'     => array( 2, 6 ), // (int[]) Posts by any of these author IDs. Since 3.7.
  'author__not_in' => array( 2, 6 ), // (int[]) Posts by none of these author IDs. Since 3.7.

  // Category: Show posts in, or not in, certain categories.
  // https://developer.wordpress.org/reference/classes/wp_query/#category-parameters
  'cat'              => 5, // (int|string) Category ID, children included. Comma-separate several IDs; prefix with - to exclude: '-12,-34'.
  'category_name'    => 'staff,news', // (string) Category slug, children included. 'staff,news' matches any; 'staff+news' matches all.
  'category__and'    => array( 2, 6 ), // (int[]) Posts in all of these categories.
  'category__in'     => array( 2, 6 ), // (int[]) Posts in any of these categories. Children are not included.
  'category__not_in' => array( 2, 6 ), // (int[]) Posts in none of these categories. Children are not included.

  // Tag: Show posts with, or without, certain tags.
  // https://developer.wordpress.org/reference/classes/wp_query/#tag-parameters
  'tag'           => 'cooking', // (string) Tag slug. 'bread,baking' matches any; 'bread+baking' matches all.
  'tag_id'        => 5, // (int) Tag ID.
  'tag__and'      => array( 2, 6 ), // (int[]) Posts with all of these tag IDs.
  'tag__in'       => array( 2, 6 ), // (int[]) Posts with any of these tag IDs.
  'tag__not_in'   => array( 2, 6 ), // (int[]) Posts with none of these tag IDs.
  'tag_slug__and' => array( 'red', 'blue' ), // (string[]) Posts with all of these tag slugs.
  'tag_slug__in'  => array( 'red', 'blue' ), // (string[]) Posts with any of these tag slugs.

  // Taxonomy: Query any taxonomy, including custom ones, with boolean logic between clauses.
  // https://developer.wordpress.org/reference/classes/wp_query/#taxonomy-parameters
  'tax_query' => array(
      'relation' => 'AND',
      array(
        'taxonomy' => 'color',
        'field'    => 'slug',
        'terms'    => array( 'red', 'blue' ),
      ),
      array(
        'taxonomy'         => 'category',
        'field'            => 'slug',
        'terms'            => array( 'staff' ),
        'include_children' => false,
        'operator'         => 'NOT IN',
      ),
    ), // (array) An array of clause arrays. Clauses can be nested, each with its own relation. Since 3.1.

  // Post & Page: Fetch specific posts or pages by ID, slug, title or parent.
  // https://developer.wordpress.org/reference/classes/wp_query/#post-page-parameters
  'p'                   => 1, // (int) Post ID.
  'name'                => 'hello-world', // (string) Post slug.
  'title'               => 'Hello World', // (string) Post title, exact match. Since 4.4.
  'page_id'             => 1, // (int) Page ID.
  'pagename'            => 'sample-page', // (string) Page slug. For a child page use 'parent/child'.
  'attachment_id'       => 1, // (int) Attachment ID.
  'post_name__in'       => array( 'hello-world', 'sample-page' ), // (string[]) Posts with any of these slugs. Since 4.4.
  'post_parent'         => 0, // (int) Children of this ID. Use 0 for top-level entries only. Hierarchical post types only.
  'post_parent__in'     => array( 1, 2, 3 ), // (int[]) Posts whose parent is any of these IDs. Since 3.6.
  'post_parent__not_in' => array( 1, 2, 3 ), // (int[]) Posts whose parent is none of these IDs. Since 3.6.
  'post__in'            => array( 1, 2, 3 ), // (int[]) Only these post IDs. Sticky posts are still prepended unless ignore_sticky_posts is set.
  'post__not_in'        => array( 4, 5 ), // (int[]) Exclude these post IDs. Must be an array; a comma-separated string does not work.
  'menu_order'          => 0, // (int) Posts with exactly this menu order.

  // Password: Filter by whether posts are password protected.
  // https://developer.wordpress.org/reference/classes/wp_query/#password-parameters
  'has_password'  => false, // (bool|null) true for posts with a password, false for posts without, null for both. Since 3.9.
  'post_password' => 'multi-pass', // (string) Posts with this exact password. Takes precedence over has_password. Since 3.9.

  // Post Type: Choose which post types to return.
  // https://developer.wordpress.org/reference/classes/wp_query/#post-type-parameters
  'post_type' => array( 'post', 'page' ), // (string|string[]) A post type or an array of them. Default 'post', or 'any' when tax_query is set.

  // Post Status: Choose which statuses to return.
  // https://developer.wordpress.org/reference/classes/wp_query/#status-parameters
  'post_status' => array( 'publish', 'private' ), // (string|string[]) A status or an array of them. Default 'publish', plus 'private' for users who can read private posts.

  // Comment: Filter by comment count or discussion settings.
  // https://developer.wordpress.org/reference/classes/wp_query/#comment-parameters
  'comment_count'     => array( 'value' => 10, 'compare' => '>=' ), // (int|array) An integer matches that exact count. An array takes 'value' and 'compare' (=, !=, >, >=, <, <=). Since 4.9.
  'comment_status'    => 'open', // (string) 'open' or 'closed'. Since 4.5.
  'ping_status'       => 'open', // (string) 'open' or 'closed'. Since 4.5.
  'comments_per_page' => 50, // (int) Comments per page on singular views. Defaults to the comments_per_page option.

  // Pagination: Control how many posts are returned and which page of them.
  // https://developer.wordpress.org/reference/classes/wp_query/#pagination-parameters
  'posts_per_page'         => 10, // (int) Posts per page. Use -1 for all. In feeds this is replaced by the posts_per_rss option.
  'nopaging'               => false, // (bool) Return all posts, no paging. Default false.
  'paged'                  => get_query_var( 'paged' ), // (int) Page number, usually get_query_var( 'paged' ).
  'page'                   => get_query_var( 'page' ), // (int) Page number on a static front page. Also the page of a post split with <!--nextpage-->.
  'posts_per_archive_page' => 10, // (int) Overrides posts_per_page when is_archive() or is_search() is true.
  'offset'                 => 0, // (int) Number of posts to skip.
  'ignore_sticky_posts'    => false, // (bool) Stop sticky posts being moved to the front. They still appear in their natural position. Default false. Since 3.1.

  // Order & Orderby: Sort the results.
  // https://developer.wordpress.org/reference/classes/wp_query/#order-orderby-parameters
  'order'     => 'DESC', // (string) 'DESC' (default) or 'ASC'.
  'orderby'   => array( 'menu_order' => 'ASC', 'date' => 'DESC' ), // (string|array) One value, several separated by spaces, or an array of field => direction pairs (since 4.0). Default 'date', or 'relevance' when searching.
  'meta_type' => 'NUMERIC', // (string) Cast applied to meta_key values when sorting by 'meta_value'. Same types as meta_query.

  // Date: Filter by publish or modified date, from simple values to full date ranges.
  // https://developer.wordpress.org/reference/classes/wp_query/#date-parameters
  'year'       => 2026, // (int) Four-digit year.
  'monthnum'   => 4, // (int) Month, 1 to 12.
  'w'          => 25, // (int) Week of the year, 0 to 53. Depends on the start_of_week option.
  'day'        => 17, // (int) Day of the month, 1 to 31.
  'hour'       => 13, // (int) Hour, 0 to 23.
  'minute'     => 19, // (int) Minute, 0 to 59.
  'second'     => 30, // (int) Second, 0 to 59.
  'm'          => 202604, // (int) Year and month together, e.g. 202611.
  'date_query' => array(
      array(
        'after'     => '2025-01-01',
        'before'    => '2025-12-31',
        'inclusive' => true,
      ),
    ), // (array) An array of date clauses. Clauses can be nested. Since 3.7.

  // Custom Field: Filter by post meta, with simple keys or a full meta_query.
  // https://developer.wordpress.org/reference/classes/wp_query/#custom-field-post-meta-parameters
  'meta_key'         => 'price', // (string|string[]) Meta key or keys.
  'meta_value'       => '100', // (string|string[]) Meta value or values.
  'meta_compare'     => '>=', // (string) Operator for meta_value. Same values as compare below. Default '=', or 'IN' for an array.
  'meta_compare_key' => '=', // (string) Operator for meta_key. Same values as compare_key below. Since 5.1.
  'meta_type'        => 'NUMERIC', // (string) Cast for meta_value. Same values as type below.
  'meta_type_key'    => '', // (string) Cast for meta_key. Only 'BINARY'. Since 5.3.
  'meta_query'       => array(
      'relation' => 'AND',
      array(
        'key'   => 'color',
        'value' => 'blue',
      ),
      'price_clause' => array(
        'key'     => 'price',
        'value'   => array( 1, 200 ),
        'type'    => 'NUMERIC',
        'compare' => 'BETWEEN',
      ),
    ), // (array) An array of meta clauses. Clauses can be nested and named. Since 3.1.

  // Permission: Include private posts when the current user may see them.
  // https://developer.wordpress.org/reference/classes/wp_query/#permission-parameters
  'perm' => 'readable', // (string) 'readable' or 'editable'.

  // Mime Type: Filter attachments by file type.
  // https://developer.wordpress.org/reference/classes/wp_query/#mime-type-parameters
  'post_mime_type' => 'image', // (string|string[]) Mime type or types. A bare type such as 'image' matches every subtype.

  // Caching: Trade cache priming for speed when you don't need the extra data.
  // https://developer.wordpress.org/reference/classes/wp_query/#caching-parameters
  'cache_results'          => true, // (bool) Cache post objects and, since 6.1, the query result itself. Default true.
  'update_post_meta_cache' => true, // (bool) Prime the meta cache. Turn off if you won't read meta. Default true.
  'update_post_term_cache' => true, // (bool) Prime the term cache. Turn off if you won't read terms. Default true.
  'update_menu_item_cache' => false, // (bool) Prime caches for the objects nav menu items point to. Default false. Since 6.1.
  'lazy_load_term_meta'    => true, // (bool) Prime term meta lazily. Defaults to update_post_term_cache. Since 4.6.
  'no_found_rows'          => false, // (bool) Skip counting total rows. Faster, but found_posts and max_num_pages become 0, so pagination stops working. Default false.

  // Search: Search post content, with control over columns and matching.
  // https://developer.wordpress.org/reference/classes/wp_query/#search-parameters
  's'              => 'pillow -sofa', // (string) Search terms. Prefix a term with - to exclude it: 'pillow -sofa'. The prefix can be changed with the wp_query_search_exclusion_prefix filter.
  'search_columns' => array( 'post_title', 'post_content' ), // (string[]) Columns to search: 'post_title', 'post_excerpt', 'post_content'. Default all three. Since 6.2.
  'exact'          => false, // (bool) Match the whole field, without wildcards. Default false.
  'sentence'       => false, // (bool) Search the input as one phrase instead of separate terms. Default false.

  // Return Fields: Return lighter results than full post objects.
  // https://developer.wordpress.org/reference/classes/wp_query/#return-fields-parameter
  'fields' => '', // (string) What to return. Anything other than the values below returns full post objects.

  // Filters: Hook into the SQL that WP_Query builds.
  // https://developer.wordpress.org/reference/classes/wp_query/#filters
  'suppress_filters' => false, // (bool) Skip the posts_* SQL filters. Default false, but get_posts() sets it to true.

);

$query = new WP_Query( $args );
