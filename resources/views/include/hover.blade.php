<style media="screen">
  .hoverTable tr:hover {
      background-color: #dfdfdf;
      cursor: pointer;
  }
</style>

<script type="text/javascript">

    jQuery(document).ready(function($) {
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
    });

</script>
