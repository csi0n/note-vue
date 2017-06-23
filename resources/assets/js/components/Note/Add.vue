<template>
	<div>
		<el-card>
			 <el-input v-model="form.title"></el-input>
			 <markdown-editor v-model="form.content" ref="markdownEditor"></markdown-editor>
			 <el-button type="primary" @click="onSubmit">保存</el-button>
    			 <el-button>返回</el-button>
		</el-card>
	</div>
</template>
<script type="text/javascript">
import {storeNote} from './../../api/api.js';
import {markdownEditor} from "vue-simplemde";
	export default{
		components:{
			markdownEditor
		},
		data(){
			return {
				form:{
					title:'',
					content:''
				}
			}
		},
		created(){
			
		},
		methods:{
			onSubmit(){
				storeNote(this.form).then(function (argument) {
					console.log(argument);
				}, function (argument) {
					console.log(argument);
				})
			}
		}
	}
</script>
<style type="text/css">
	.markdown-editor{
		margin-top: 10px;
	}
</style>