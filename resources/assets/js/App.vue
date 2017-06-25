<template>
	<div>
	        <el-card>
	        	<el-row>
	        		<el-row>
	        			<el-col :span="12">
	        				<el-breadcrumb separator="/">
				                	<el-breadcrumb-item :to="{ path: '/' }">首页</el-breadcrumb-item>
				                	<el-breadcrumb-item>活动管理</el-breadcrumb-item>
				                	<el-breadcrumb-item>活动列表</el-breadcrumb-item>
				                	<el-breadcrumb-item>活动详情</el-breadcrumb-item>
	            			</el-breadcrumb>
	        			</el-col>
	        			<el-col :span="12" style="float: right !important">
		        			 <router-link :to="{ name: 'note.add'}">
	                                                <i class="el-icon-plus"></i>
	                                            </router-link>
	        				
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
    export default{}
</script>