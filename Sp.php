<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://unpkg.com/vue"></script>

</head>
    <body>
<div id="vm">

        <select v-model="ind">
            <option disabled value="">請選擇您要的商品</option>
            <option v-bind:value="indexs" v-for="(location,indexs) in locations">{{location.itername}}
            </option>

        </select>


        <button v-on:click="Insert" class="btn btn-primary">新增</button>
<!--        <button v-on:click="Insert" class="btn btn-danger">加入購物車</button>-->
        <b style="font-size:20px;">尋找你要的商品名稱:</b>
        <input type="text"  v-model="keywords" placeholder="尋找">
<!--        <button >購物車</button>-->
<!--
        <div class="container" >
          <h2>購物清單</h2>
          <ul class="list-group" v-for="(a,index) in search">
            <li class="list-group-item">
            <img v-bind:src="a.imgname" style="width: 50px">    
            <b class="good-title">{{a.name}}</b>
            <span style="color: #7a45e5;">$<b>{{a.pri}}</b></span>    
            </li>
            
          </ul>
        </div>
-->
        <table class="table table-condensed"  >    
                <tr>
                <th>圖片</th>
                <th>品名</th>
                <th>價格</th>
                <th>數量</th>
                <th>總額</th>
                <th>操作</th>
              </tr>
              <tr v-for="(a,index) in search">
                <td><input type="checkbox" v-model="group" v-bind:value="index">
                    <img v-bind:src="a.imgname" style="width: 50px;height:70px;">
                </td>
                <td>{{a.name}}</td>
                <td>{{a.pri}}</td>
                <td>
                    
                <button id="dd"  v-on:click="Minus(index)">-</button>
                    
                    {{a.counts}}
                <button id="dd"  v-on:click="Plus(index)">+</button>
                </td>
                <td>{{a.totals}}</td>
                <td>
                <button id="dd" v-model="count" v-on:click="Del(index)">刪除</button>
                </td>
              </tr>
        </table>    

       

</div>  
<script>
    
    var x=0,i=0;
    var data =[{type:0,title:'qweqw'},
               {type:1,title:'zzz'}]
    
    
    var lists = {
        namelists : '123',
        emaillists: 'weqrer',
        menu :[{type:'sdf',title:'qweqw'}]
    }
    
    
new Vue({
  el: '#vm',
  data: {  
      yy:[{price:100},{price:200}],
      xx:[],
      locations:[
        {
            src:"corn.jpg",
            price:100,
            itername:"玉米",
            total:100,
            count:1,
        },
        {
            src:"bo.jpg",
            price:500,    
            itername:"筍子",
            total:500,
            count:1,
        },
        {
            src:"tree.jpg",
            price:800,    
            itername:"山藥",
            total:800,
            count:1,
        },
          {
            src:"whitebo.jpg",
            price:50,    
            itername:"筊白筍",
            total:50,
            count:1,
        },
          {
            src:"beef.jpg",
            price:80,    
            itername:"荷蘭豆",
            total:80,
            count:1,
        }
                ],
      
      ind:'',
      keywords:'',
      inp:[],
      mony:[],
      email:'請輸入信箱',
      fname:"請輸入資料",
      shop:[],
      isactive :false,  
      group:[],
      
      
  },
    computed :{
        search : function(){
            if(this.keywords){
                 
               return  this.shop.filter(item=>{
                   return item.name === this.keywords
                     
                })
               
            }
            else{
                console.log("sfsfsd")
                return this.shop 
            }
              
    }
    },
    methods :{
      
         show: function () {
                this.visible = true;
         },
        oo: function(){
            this.xx.push({ rr : 300 })
        },
        ss :function(){
            var self = this;
            setInterval(function () {
              self.show = !self.show;
            }, 1000)
        },
        qq:function(){
            var start = this.a.substring(0,1)
            var end = this.a.substring(1)
            this.a=end+start
        },
        
        Insert : function(){
            var inddex =  this.count+=1
           
             if(this.shop.length>0)
                 {
                     
                   
                     console.log()
                    if(this.shop[x].name==this.locations[this.ind].itername)
                    {
                        console.log("ffffff");
                        return false;
                    }
                     
                     for(i=0;i<this.shop.length;i++)
                           {
                             
                               
                            if(this.shop[i].name==this.locations[this.ind].itername)
                                  {
                                       return false;
                                   }
                               
                              
                           }
                    
                      
                        
                      x+=1;
                    
            
                      
                }
                this.shop.push({name:this.locations[this.ind].itername,
                                pri:this.locations[this.ind].price,
                                imgname:this.locations[this.ind].src,
                                totals:this.locations[this.ind].total,
                                counts:this.locations[this.ind].count});
               
              console.log(x);
                console.log(this.locations[this.ind].price);
            console.log(this.ind)
//          
            
            
            
            this.mony.push({total:this.locations[this.ind].total})
            this.inp.push(this.fname)

        },
        
        Del : function(index){
            
            this.shop.splice(index,1)

            x=x-1;
            if(x==-1)
                {
                    x=0;
                }

            console.log(index)
            console.log(this.shop);
            console.log(this.locations[this.ind].price);
            console.log(this.ind)
        },
        Plus : function(index){
            console.log(index)
            this.shop[index].totals+=this.shop[index].pri
            console.log( this.locations[index].price)
            this.shop[index].counts+=this.locations[index].count
            
        },
        Minus : function(index){
            if(this.shop[index].counts>this.locations[index].count)
                {
                    this.shop[index].counts-=1
                }
            if(this.shop[index].totals>this.shop[index].pri)
                {
                    this.shop[index].totals-=this.shop[index].pri
                }
            
            
        },
        r: function(){
            this.count+=1;
        }
    },
    created(){
       
         console.log(this.mony)
            this.loading = true
            console.log(this.ind)
    }
});
</script>
        <style>
        .goods-title {
                font-size: 500px;
            }
        </style>
</body>
</html>