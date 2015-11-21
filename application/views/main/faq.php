<?php
$listFAQ = $this->globals->getFAQ();

?>
<div class="container contact-page">
	<div class="row">
		<div class="col-sm-12 text-center ">
		<div class="contact-title">
			<h1 class=""><?php echo lang('faq_title'); ?></h1>
					<div class="border-bottom-title border-color-1"></div>
				</div>
		</div>
	</div>
	<div class="row ">
	 <div class="col-sm-12">

	 	<div class="panel-group" id="accordion">
	 	 <?php
if (isset($listFAQ) && count($listFAQ) > 0) {
	foreach ($listFAQ as $key => $value) {?>
	 	 			 <div class="panel panel-default">
					    <div class="panel-heading">
					      <h4 class="panel-title">
					        <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $key; ?>">
					        <?php echo $value->faq_question; ?></a>
					      </h4>
					    </div>
					    <div id="collapse<?php echo $key; ?>" class="panel-collapse collapse in">
					      <div class="panel-body"><?php echo nl2br($value->faq_answer); ?></div>
					    </div>
					  </div>
	 	 		<?php }
}
?>
</div>
	 </div>
	</div>
</div>

