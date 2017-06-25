<template>
            <div>
                <el-col :span="6" v-for="(item, index) in lists" :key="index" :offset="index > 0 ? 1 : 0">
                            <el-card :body-style="{ padding: '0px' }">
                                <span style="padding:14px;margin-top: 8px;">{{item.title}}</span>
                                <div style="padding: 14px;">
                                    <span>{{item.content}}</span>
                                    <div class="bottom clearfix">
                                        <time class="time">{{ item.created_at }}</time>
                                        <i class="el-icon-edit" @click="goEdit(item.id)"></i>
                                        <i  class="el-icon-delete2" @click="destroy(item.id)"></i>
                                    </div>
                                </div>
                            </el-card>
                </el-col>
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
                lists: []
            };
        },
        methods: {
            goEdit(id){
                this.$router.push({name:'note.edit',params:{id:id}});
            },
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