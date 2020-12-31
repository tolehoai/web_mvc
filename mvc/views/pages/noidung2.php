<style>
    .app{
        height:100vh;
        /* background-color:blue; */
    }
    /* Style the video: 100% width and height to cover the entire window */
#myVideo {
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%;
  min-height: 100%;
}


</style>
<body>
    The video 
<video autoplay muted loop id="myVideo">
  <source src="/web_mvc/public/bg.mp4" type="video/mp4">
</video>

</body>