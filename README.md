# madkudu-website

## Development

### Build

Initialize the project with
```shell
npm install
```

then, build, serve and watch the site with
```shell
gulp
```

### Version control

Write your changes on a branch

To create a branch: `git branch mybranchname`

To switch to that branch: `git checkout mybranchname`

## Deployment

Managed via codeship

Every push to the master branch automatically deploys the new version.

Common git flow is:
```
git add .
git commit -m 'message about the changes made'
git rebase origin master
git push origin mybranchname
```
Then go to Github, create a pull request and merge to master there.

## Blog

**Do not make changes the /blog folder.** Go to [http://www.madkudu.com/blog/wp-admin](http://www.madkudu.com/blog/wp-admin) and update Wordpress directly

## Project organization

### Javascript

Already included:

* jQuery
* Bootstrap

To add new .js:

* Add a file to .js/madkudu
* It will be automatically compiled and minified into a larger file and loaded on every page

#### Add vendor .js

If you need external javascript (e.g. moment.js), two options:

* load it directly on your page via https://cdnjs.com/ (if available)
* if not, ask Paul

### Less / CSS

* Separate your css in digestible chunks
* Our custom (non-theme) css is in `/less/madkudu`
* To add new files, save them to `less/madkudu`, then update `/less/madkudu.less` and add a reference to your new file

### Analytics

Segment's `analytics.js` is automatically loaded on all pages. You can use `analytics.track()` and others directly on any page.

## Best practices

* Do not modify existing .css classes (in particular the bootstrap classes). Instead, create new classes.

## Resources

[Bootstrap theme](http://themes.getbootstrap.com/products/marketing)
[Bootstrap components](http://getbootstrap.com/css/)
[Bootstrap components](http://getbootstrap.com/components/)
[Bootstrap javascript](http://getbootstrap.com/javascript/)

