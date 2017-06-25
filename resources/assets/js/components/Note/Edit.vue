<template>
	<div>
		<el-card>
			 <el-input v-model="form.title"></el-input>
			 <markdown-editor v-model="form.content" ref="markdownEditor"></markdown-editor>
			 <el-button type="primary" @click="postPatchNote">更新</el-button>
    			 <el-button>返回</el-button>
		</el-card>
	</div>
</template>
<script type="text/javascript">
import {editNote,patchNote} from './../../api/api.js';
import {markdownEditor} from "vue-simplemde";
	export default{
		components:{
			markdownEditor
		},
		data(){
			return {
				form:{
					id:this.$route.params.id,
					title:'',
					content:''
				}
			}
		},
		created(){
			this.fetchEditNote();
		},
		methods:{
			fetchEditNote(){
				let that=this;
				editNote(this.form).then(function (argument) {
					if (argument.status===200) {
						that.form=argument.data.result.note;
					}
				}, function (argument) {
					
				})
			},
			postPatchNote(){
				let that=this;
				patchNote(this.form).then(function (argument) {
					if (argument.status===200) {
						that.$message('更新成功!');
						that.$route.push({name:'home'});
					}else{
						that.$message.error('更新失败!');
					}
				}, function (argument) {
					that.$message.error('更新失败!');
				});
			}
		}
	}
</script>
<style type="text/css">
	.markdown-editor{
		margin-top: 10px;
	}
</style>