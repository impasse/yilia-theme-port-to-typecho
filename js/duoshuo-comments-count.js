(function () {
	var keys = [];
	var elements = {};
	var domain = 'shyling';
	var count_string = ['更多内容>>', '1条评论>>', '{num}条评论>>'];
	
	function setArticleCommentsCount(element, count) {
		var str = count_string[0];
		if (count === 1) {
			str = count_string[1];
		} else if (count > 1) {
			str = count_string[2].replace('{num}', count);
		}
		$(element).find('.article-more-link>a').text(str);
	}
	
	function readCommentsCount(data) {
		if (data.code === 0) {
			for (var item in data.response) {
				var tmp = elements[item];
				if (tmp) {
					setArticleCommentsCount(tmp, data.response[item].comments);
				}
			} 
		}
	}
	
	$("article").each(function () {
		var key = $(this).data("thread-key");
		if (key) {
			elements[key] = $(this);
			keys.push(key);
		}
	});
	
	if (keys) {
		$.getJSON(document.location.protocol+'//api.duoshuo.com/threads/counts.jsonp?short_name='+domain+'&threads=' + keys.join(',')+'&callback=?',readCommentsCount);
	}
})();
