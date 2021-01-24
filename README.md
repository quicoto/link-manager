# 🔗 Link Manager

WordPress Theme to manage links.

![Desktop screenshot](https://cloudup.com/cBnxQKOIHJz+)

![Mobile screenshot](https://cldup.com/kFVpZkpyrM.png)

## 💡 How to set up?

1. Add the theme to your `wp-content/themes` folder
2. Activate the theme
3. Create at least 1 link and add the Custom Field with the value `url`. This way the meta boxes dropdown will have the `url` value for next time you want to create a link.

![WordPress Dashboard Custom Fields](https://cldup.com/G3NQCsUPd5.png)

4. Disable the Visual editor in your Profile. So we only use the regular HTML textarea field. Like so:

![WordPress Profile Disable Visual Editor](https://cldup.com/1LPYmBLkNN.png)

5. Set a Search Widget to the sidebar.
6. Set a Tag Cloud Widget to the sidebar.

![WordPress Widgets](https://cldup.com/8_BR1x4eu9.png)

Done! 🎉 Now you can go to the next section and make use of the powerful bookmark autofill.

## 🔖 Use the bookmark

Add this bookmark to your browser. Visit any site and hit the bookmark. You'll be redirected to the WordPress Dashboard with the page title and URL prefilled for you:

```javascript
javascript:window.location=`YOUR_SITE/wp-admin/post-new.php?post_type=link&title=${encodeURIComponent(document.title)}&url=${encodeURIComponent(window.location.href)}&description=${document.querySelector('meta[name="description"]')?.content}`
```

## Automatically share links via RSS

The RSS feed has been modified to include all your links.

You can use [IFTT](https://ifttt.com/) or similar service to pull your RSS feed and automatically share the links to your Twitter or Mastodon account.