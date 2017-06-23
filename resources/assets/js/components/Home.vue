<template>
    <div>
        <el-card>
            <el-breadcrumb separator="/">
                <el-breadcrumb-item :to="{ path: '/' }">首页</el-breadcrumb-item>
                <el-breadcrumb-item>活动管理</el-breadcrumb-item>
                <el-breadcrumb-item>活动列表</el-breadcrumb-item>
                <el-breadcrumb-item>活动详情</el-breadcrumb-item>
            </el-breadcrumb>
        </el-card>
        <el-row>
            <el-col :span="6" v-for="(o, index) in 2" :key="o" :offset="index > 0 ? 1 : 0">
                <el-card :body-style="{ padding: '0px' }">
                    <span style="padding:14px;margin-top: 8px;">123</span>
                    <div style="padding: 14px;">
                        <span>好吃的汉堡</span>
                        <div class="bottom clearfix">
                            <time class="time">{{ currentDate }}</time>
                            <el-button type="text" class="button">操作按钮</el-button>
                        </div>
                    </div>
                </el-card>
            </el-col>
        </el-row>
    </div>
</template>
<script>
import {myNotes} from './../api/api.js';
    export default{
        created(){
            this.fetchNotes();
        },
        data() {
            return {
                currentDate: new Date()
            };
        },
        methods:{
            fetchNotes(){
                myNotes().then(function(argument){
                    console.log(argument);
                }, function(argument){

                })
            }
        }
    }
</script>