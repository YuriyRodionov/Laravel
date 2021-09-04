<h2>Админка</h2>
<?php foreach ($newsList as $news): ?>
    <div>
        <h2><a href="<?=route('news.show', ['id' => $news['id']])?>"><?=$news['title']?></a></h2>
        <p><?=$news['title_id']?></p>
        <p><?=$news['author']?></p>
    </div>

<?php endforeach; ?>
