<template>
	<div>
		<el-card>
			<el-input placeholder="请输入账号" v-model="form.email">
    				<template slot="prepend">邮箱:</template>
 			</el-input>
 			<el-input placeholder="请输入密码" v-model="form.password">
    				<template slot="prepend">密码:</template>
 			</el-input>
 			<el-button type="primary" @click="onSubmit">登录</el-button>
    			<el-button>取消</el-button>
		</el-card>
	</div>
</template>
<script type="text/javascript">
import {postLogin} from './../api/api.js';
	export default{
		data(){
			return {
				form:{
					email:'',
					password:''
					}
			}
		},
		created(){
			
		},
		methods:{
			onSubmit(){
				postLogin(this.form).then(function (argument) {
					if (argument.message==='success') {
						sessionStorage.setItem('token',argument.result.token);
					}
				}, function(argument){
					console.log(argument);
				});
			}
		}
	}
</script>