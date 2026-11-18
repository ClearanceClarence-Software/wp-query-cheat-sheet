<h1>
  <picture>
    <source media="(prefers-color-scheme: dark)" srcset="assets/logo-dark.svg">
    <img src="assets/logo-light.svg" alt="WP_Query Cheat Sheet" height="56">
  </picture>
</h1>

Every parameter you can pass to `new WP_Query()`, grouped by what it does, with a copyable example for each group. Checked against WordPress 7.1.

**Site:** https://clearanceclarence-software.github.io/wp-query-cheat-sheet/

**Playground:** https://clearanceclarence-software.github.io/wp-query-cheat-sheet/playground.html

## What's in it

- Every top-level `WP_Query` parameter, plus the keys inside `tax_query`, `date_query` and `meta_query`, with types and the WordPress version each one arrived in
- Allowed values for `post_type`, `post_status`, `orderby` and `fields`
- Notes on common pitfalls, such as an empty `post__in` returning every post, or `offset` breaking pagination
- A filter box (press `/`) to find a parameter fast
- A [playground](https://clearanceclarence-software.github.io/wp-query-cheat-sheet/playground.html) that runs your `$args` against a real WordPress in the browser, using [WordPress Playground](https://wordpress.org/playground/). It shows the matching posts, the SQL WordPress generated, the resolved query vars, and warnings for common mistakes. Every example on the cheat sheet has a **Try it** link.
- An **Arrays** switch to show every example with `array()` (WordPress coding standards) or short `[]` syntax. The choice is remembered and carries over to the playground.
- [`wp-query-cheat-sheet.php`](wp-query-cheat-sheet.php): every parameter in one PHP array, for pasting into your editor. Also available with short arrays: [`wp-query-cheat-sheet-short-arrays.php`](wp-query-cheat-sheet-short-arrays.php)

## Contributing

Spotted something wrong or out of date? [Open an issue](https://github.com/ClearanceClarence-Software/wp-query-cheat-sheet/issues/new/choose); there are forms for wrong information, missing parameters and playground problems. See the [contributing guide](.github/CONTRIBUTING.md) for details.

## Credits

This project was inspired by [wp-query-ref](https://github.com/luetkemj/wp-query-ref) by [luetkemj](https://github.com/luetkemj) and its contributors. For years it was the one place to find every WP_Query argument on a single page, and this project wouldn't exist without it.

The WP_Query Cheat Sheet is a separate project, written from scratch against current WordPress core source and the official documentation. It is not affiliated with or endorsed by the original author.

## License

GPL-2.0-or-later, the same as WordPress. See [LICENSE](LICENSE).

---

A [CC Software](https://github.com/ClearanceClarence-Software) project by ClearanceClarence.
