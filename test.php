<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap 4 Popovers</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
	.bs-example{
    	margin: 150px 50px;
    }
</style>
<script>
$(document).click(function(){
    $('[data-toggle="popover"]').popover({
        placement : 'top'
    });
});
</script>
</head>
<body>
<div class="bs-example">
    <div class="popover-demo mb-2">
        <button type="button" class="btn btn-primary" data-toggle="popover" title="Popover title" data-content="Default popover">Popover</button>
        <button type="button" class="btn btn-success" data-toggle="popover" title="Popover title" data-content="Another popover">Another popover</button>
        <button type="button" class="btn btn-info" data-toggle="popover" title="Popover title" data-content="A larger popover to demonstrate the max-width of the Bootstrap popover.">Large popover</button>
        <button type="button" class="btn btn-warning" data-toggle="popover" title="Popover title" data-content="The last popover!">Last popover</button>
    </div>
	<p><strong>Note:</strong> Click on the buttons to display/hide the popover.</p>
</div>
</body>
</html>