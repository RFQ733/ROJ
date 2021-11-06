<?php
include_once("./engine/header.php");


//  include("./engine/showdata.php") ;
?>

<div id="app">
<div class="container ">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="card-body">
					<h4>问题</h4>
				
                <ul class="pagination">
                    <li><a href="#" @click=" changelow()">&laquo;</a></li>
                    <li><a href="#"@click="change(1)">1</a></li>
                    <li><a href="#" @click="change(2)">2</a></li>
                    <li><a href="#" @click="change(3)">3</a></li>
                    <li><a href="#" @click="change(4)">4</a></li>
                    <li><a href="#"@click="change(5)" >5</a></li>
                    <li><a href="#"@click="changebig()" >&raquo;</a></li>
                </ul>
                
                <table class="table table-hover">
						<thead>
							<tr class="toprow">
								<th></th>
								<th class="hidden-xs">
									id
								</th>
								<th>
									标题								</th>
								<th class="hidden-xs">
									来源/分类								</th>
								<th style="cursor:hand">
									限制时间								</th>
								<th style="cursor:hand">
									限制空间							</th>
							</tr>
						</thead>
						<tbody>

    <tr class="evenrow"v-for=" (item,index) in fw " >
        <td>
            <div class="none"> </div>
        </td>
        <td class="hidden-xs">
            <div fd="problem_id" class="center">{{ item.problem_id  }}</div>
        </td>
        <td>
            <div class="left"><a :href=" item['problem_description']" >{{item['problem_name']}}</a></div>
        </td>
        <td class="hidden-xs">
            <div pid="1001" fd="source" class="center"></div>
        </td>
        <td>
            <div class="center">
                {{item.problem_time_limit}} ms
            </div>
        </td>
        <td>
            <div class="center">
                {{item.problem_memory_limit}} MB
            </div>
        </td>
    </tr>

    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    
    <script> 
        
        var ww =[
        ];
        
        
        var vm = new Vue({
            el:"#app" ,
            data:{
                 fw: ww,
                 page:1 
                 
        },methods: {
            change:function (e){
               vm.page= e;
               vm.fw =[] ;
            axios.get('/engine/query_data.php?page=' + vm.page )
                .then(function (response) {
            response.data.forEach(
                 function(element ) {
               
                ww.push(element);
                
                vm.fw.push(element);
            });

            
        })
        .catch(function (error) {
            console.log(error);
        });
            },
            changebig: function (params) {
                vm.change(vm.page+1);
            },
            changelow:function (params) {
                vm.change(vm.page -1 );
            }
        },
            
        
        })
         axios.get('/engine/query_data.php?page=1')
        .then(function (response) {
            
            response.data.forEach(element => {
                
                ww.push(element);
            });

            
        })
        .catch(function (error) {
            console.log(error);
        });
        
      


    </script>





<?php
include_once("./engine/footer.php");
?>