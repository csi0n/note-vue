<template>
	<div>
	        <el-card>
	        	<el-row>
	        		<el-row>
	        			<el-col :span="12">
	        				<el-breadcrumb separator="/">
				                	<el-breadcrumb-item v-for="(item,index) in breadcrumb" :key="index">{{item.zh_name}}</el-breadcrumb-item>
	            			</el-breadcrumb>
	        			</el-col>
	        			<el-col :span="12">
	                                                <div class="pull-right">
	                                                	<i class="iconfont icon-add" @click="$router.push({name: 'note.add'})"></i>
	                                                	<i v-show="icon.grid" class="iconfont icon-grid"></i>
	                                                </div>
	        			</el-col>
	        		</el-row>
	        		
	        	</el-row>
	            
	        </el-card>
	        <el-row style="margin-top: 10px;">
	            <router-view></router-view>
	        </el-row>
    	</div>
</template>
<script>
    export default{
    	created(){
    		this.breadcrumb=this.$router.meta.breadcrumb;
    	},
    	data(){
    		return {
    			icon:{
    				add:true,
    				grid:this.$router.name==='home'
    			},
    			breadcrumb:[]
    		}
    	},
    	methods:{
    	},
    	watch:{
    		'$route':function (argument) {
    			let actions=argument.meta.actions||[],that=this;
    			that.icon.grid=false;
    			that.breadcrumb=argument.meta.breadcrumb;
    			actions.forEach(function (v) {
    				if (v==='grid') {
    					that.icon.grid=true;
    				}
    			});
    		}
    	}
    }
</script>