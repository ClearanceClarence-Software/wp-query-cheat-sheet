# Contributing

Thanks for helping make the WP_Query Cheat Sheet better. Corrections are the most valuable contribution: if something on the site is wrong or out of date, I want to know.

## The quickest way to help: open an issue

Pick the form that fits:

- **[Wrong or outdated information](https://github.com/ClearanceClarence-Software/wp-query-cheat-sheet/issues/new?template=1-wrong-info.yml)**: a parameter, value, default or example is incorrect.
- **[Missing parameter, value or example](https://github.com/ClearanceClarence-Software/wp-query-cheat-sheet/issues/new?template=2-missing.yml)**: something the cheat sheet should cover.
- **[Playground problem](https://github.com/ClearanceClarence-Software/wp-query-cheat-sheet/issues/new?template=3-playground.yml)**: the playground won't start, or gives a wrong result.

Please include a source for content changes: a link to [WordPress core source](https://github.com/WordPress/wordpress-develop/blob/trunk/src/wp-includes/class-wp-query.php), a Trac ticket or changeset, or the [official documentation](https://developer.wordpress.org/reference/classes/wp_query/). If you can, reproduce the behavior in the [playground](https://clearanceclarence-software.github.io/wp-query-cheat-sheet/playground.html) and paste the link from **Copy link**.

For help with a query on your own site, the [WordPress support forums](https://wordpress.org/support/forum/wp-advanced/) are a better place to ask.

## Pull requests

`index.html`, `playground.html` and `wp-query-cheat-sheet.php` are generated from a single source, so the same fact appears in several places. Pull requests that edit these files directly are still welcome: I'll review the change and carry it into the source, then regenerate. Keep in mind:

- One fix per pull request makes review quicker.
- Back up content changes with a source, as above.
- `style.css` and the files in `assets/` are edited by hand, so changes there can be merged as they are.

## Style

- American English spelling.
- Plain, short sentences. Say what a parameter does, then any catch.
- Mention the WordPress version when a parameter or behavior was introduced or changed.
- Examples should work against the playground's sample content.

## Code of conduct

Please be kind and constructive. See the [code of conduct](CODE_OF_CONDUCT.md).
