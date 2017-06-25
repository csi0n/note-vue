<template>
            <div>
                <template v-if="type==='grid'">
                    <el-row>
                        <el-col :span="6" v-for="(item, index) in lists" :key="index" :offset="index > 0 ? 1 : 0">
                                <el-card>
                                    <el-row>
                                        <el-col :span="24">
                                             <span class="card-title">{{item.title}}</span>
                                        </el-col>
                                    </el-row>
                                    <el-row>
                                        <el-col :span="24">
                                            <span class="card-content">{{item.content}}</span>
                                        </el-col>
                                    </el-row>
                                   <el-row>
                                       <el-col :span="12">
                                           <time class="card-time">{{item.created_at}}</time>
                                       </el-col>
                                       <el-col :span="12">
                                           <div class="pull-right iconfont-group">
                                               <i class="iconfont icon-edit" @click="$router.push({name:'note.edit',params:{id:item.id}})"></i>
                                                <i  class="iconfont icon-delete" @click="destroy(item.id)"></i>
                                           </div>
                                       </el-col>
                                   </el-row>
                                </el-card>
                        </el-col>
                    </el-row>
                </template>
                <template v-else="type==='list'">
                    <el-row>
                        <el-col :span="24" v-for="(item,index) in lists" :key="index">
                            <el-card>
                                <el-row>
                                    <el-col :span="12">
                                        <span class="card-title">{{item.title}}</span>
                                    </el-col>
                                    <el-col :span="12">
                                        <time class="pull card-time">{{item.created_at}}</time>
                                    </el-col>
                                </el-row>
                                <el-row>
                                    <el-col :span="24">
                                        <span class="card-content">{{item.content}}</span>
                                    </el-col>
                                </el-row>
                                <el-row>
                                    <el-col :span="24">
                                        <div class="iconfont-group">
                                                <i class="iconfont icon-edit" @click="$router.push({name:'note.edit',params:{id:item.id}})"></i>
                                                <i  class="iconfont icon-delete" @click="destroy(item.id)"></i>
                                        </div>
                                    </el-col>
                                </el-row>
                            </el-card>
                        </el-col>
                    </el-row>
                </template>
               
            </div>
</template>
<script>
    import {myNotes,destroyNote} from './../api/api.js';
    export default{
        created(){
            this.fetchNotes();
        },
        data() {
            return {
                lists: [],
                type:'list'
            };
        },
        methods: {
            fetchNotes(){
                let that = this;
                myNotes().then(function (response) {
                    if (response.status === 200) {
                        that.lists = response.data.data;
                    }
                }, function (argument) {
                })
            },
            destroy(id){
                let that=this;
                this.$confirm('是否删除?','提示',{
                    confirmButtonText:'确定',
                    cancelButtonText:'取消',
                    type:'warning'
                }).then(function (argument) {
                    destroyNote({id:id}).then(function (argument) {
                    if (argument.status===200) {
                        that.$message('删除成功');
                    }else{
                        that.$message.error('删除失败');
                    }
                    }, function (argument) {
                    that.$message.error('删除失败');
                    })
                }, function (argument) {
                    that.$message({
                        message:'取消操作',
                        type:'warning'
                    })
                })
                
                
            }
        }
    }
</script>
<style type="text/css">
    .card-body{
        padding: 14px;
    }
    .card-title{
        font-size: 20px;
    }
    .card-content{
        font-size: 14px;
    }
    .card-time{
        color: grey;
        font-size: 13px;
    }
</style>