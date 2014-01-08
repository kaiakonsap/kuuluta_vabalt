<div class="container">
	<div class="well">
		<ul class="list-group">
            <?foreach ($help as $question):?>
                <li class="list-group-item"><a href="#q<?=$question['help_id']?>"><?=$question['help_q']?></a></li>
            <?endforeach?>
		</ul>
            <?foreach ($help as $question):?>
                <div id="q<?=$question['help_id']?>" class="panel panel-success">
                    <div class="panel-heading"><h4><?=$question['help_q']?></h4></div>
                    <div class="panel-body"><?=$question['help_a']?>
                        <a href="#" class="pull-right">Tagasi üles</a></div>
                </div>
            <?endforeach?>
		<h1>Lisa küsimus</h1>
        <form method="POST" action="">
		    <textarea name="new_question" class="form-control" rows="3" placeholder="Sisesta küsimus siia"></textarea>
		    <button type="submit" class="btn btn-primary btn-lg">Sisesta</button>
            <?php if (isset($_SESSION['adInsertSuccess'])):?>
            <br/><span class="alert alert alert-success">
                <?php echo $_SESSION['adInsertSuccess'];
                      unset($_SESSION['adInsertSuccess']);?>
            </span>
            <? endif; ?>
        </form>
        <!--Kas küsimused poleks mõttekam lasta saata meiliga ja need peale ülekontrollimist üles panna,
        sest see viis annab võimaluse väga halvaks spämmiks? -->
	</div>
</div>