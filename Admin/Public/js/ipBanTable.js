// $(function(){
// var jb = $("#tab1");
// var jbtab = $(".tbBody");
// var action = $(".tbTop").attr("name");
// var table = $(".tbTop").text();
// var htmBody = '<div id="operate"><input type="text" /><button class="search">搜&nbsp;&nbsp;&nbsp;索</button><button class="all">显示全部</button><button class="delete">删除选中项</button></div><hr /><table><thead><tr><th>编号</th><th>选择</th>';
// // var url = '{:U("'+action+'/'+table+'")}';
// $.each(jbtab,function(i,v){
// 	htmBody += "<th>"+ $(v).text() +"</th>";
// });
// htmBody += "</tr></thead><tbody><?php foreach($list as $row){?><tr id='tr<?php echo $row['id'];?>'>";
// htmBody += "<td><?php echo $row['id'];?></td><td><input type='checkbox' name='"<?php echo $row['id'];?>' /></td>";
// $.each(jbtab,function(i,v){
// 	htmBody += "<td><?php echo $row["+ $(v).attr('name') +"]?></td>";
// });
// htmBody += "</tr><?php }?></tbody>";
// alert(htmBody);
// jb.empty();
// jb.html(htmBody);
// });




