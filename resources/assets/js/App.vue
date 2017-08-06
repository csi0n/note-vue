<template>
    <div>
        <el-card>
            <el-row>
                <el-row>
                    <el-col :span="12">
                        <el-breadcrumb separator="/">
                            <el-breadcrumb-item v-for="(item,index) in $route.meta.breadcrumb" :key="index">
                                {{item.zh_name}}
                            </el-breadcrumb-item>
                        </el-breadcrumb>
                    </el-col>
                    <el-col :span="12">
                        <div class="pull-right">
                            <template v-for="(v,index) in $route.meta.actions">
                                <i class="iconfont icon-add" v-if="v==='add'"
                                   @click="$router.push({name: 'note.add'})"></i>
                                <i class="iconfont icon-grid" v-if="v==='grid'" @click="clickGrid"></i>
                            </template>
                        </div>
                    </el-col>
                </el-row>
            </el-row>
        </el-card>
        <el-row style="margin-top: 10px;">
            <router-view ref="routerView"></router-view>
        </el-row>
    </div>
</template>
<script>
    export default {
        created() {
        },
        data() {
            return {}
        },
        methods: {
            clickGrid() {
                this.$refs.routerView.$emit('grid', true);
            }
        },
        watch: {
        }
    }
</script>