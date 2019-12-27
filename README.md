# Seen - a tiny PHP image tracker

<img align="left" width="360" src="https://seen.datapp.tech/seen.php?image=images/graphic.png">
<br/><br/><br/>
When an image embedded in an email or a website (or this very README page) is displayed to the user, it is most of the times being downloaded from an off-site source by the client (browser) as the page itself loads.
<br/>
Thanks to this behavior, it is possible to keep track of when and where images were loaded (or when emails were read) simply by inserting a tracker script in the middle.
<br/><br/><br/><br/><br/>

**An example of a tracking snippet:**

`<img src="https://your.server.com/seen.php?image=https://image.source.com/image.jpg">`

where the original image url is `https://image.source.com/image.jpg`

and the tracker is at `https://your.server.com/seen.php`

- The client first sends a request to the tracker URL
- The script saves tracking info (in this case to a MySQL database)
- The tracker redirects the client to the actual image
- The image is displayed as if it was loaded without the tracker

Seen is a bare implementation of such a redirect based image tracker.
