<script>
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
  }
</script>

<iframe src="../../raw/index.html" onload="resizeIframe(this)" style="background:none; border:0px solid red;" height="1000px" width="100%"></iframe>
