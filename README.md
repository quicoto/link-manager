# Link Manager

WordPress Theme to manage links.

## How to set up?

1. Add the theme to your `wp-content/themes` folder
2. Activate the theme
3. Create at least 1 link and add the Custom Field with the value `url`. This way the meta boxes dropdown will have the `url` value for next time you want to create a link.

![WordPress Dashboard Custom Fields](https://cldup.com/G3NQCsUPd5.png)

Now you can go to the next section and make use of the powerful bookmark autofill.

## Use the bookmark

Add this bookmark to your browser. Visit any site and hit the bookmark. You'll be redirected to the WordPress Dashboard with the page title and URL prefilled for you:

```javascript
javascript:window.location=`YOUR_SITE/wp-admin/post-new.php?post_type=link&title=${encodeURIComponent(document.title)}&url=${encodeURIComponent(window.location.href)}`
```

## To Do

- [x] Create build
- [x] Use Bootstrap as a depedency
- [x] Create webpack bundle for the admin script
- [x] Use PHP for for loading links, categories, pagination...
- [x] Create home list
- [ ] Create pagination
- [ ] Create archive of tags
- [ ] Create search
- [ ] Create custom post type
- [ ] Remove all comments code
- [ ] Post content: description of the link (to be used as additional text when sharing to Twitter)
- [ ] URL of the link will be a meta field.
- [ ] Create RSS feed or include the post type in the main one (so it can be triggered to share on Mastodon)
- [ ] Add rel="nofollow noopener" to the links (check syntax)
- [ ] User can toggle on/off "share" when posting (default: on)
- [ ] User can toggle on/off "read" when posting (default: on)
- [ ] User can set the link as "read"
- [ ] Double check no extra unused functions are left
- [ ] Add screenshot
