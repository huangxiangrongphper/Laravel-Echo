<template>
    <div class="container">
        <ul class="list-group">
            <li class="list-group-item" v-for="task in tasks" v-text="task"></li>
        </ul>
        <hr>
        <form @submit.prevent="addTask" method="POST">
            <div class="form-group">
                <input v-model="newTask" type="text" class="form-control" placeholder="Add a Task">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>
    export default {
        props:['project'],
        data() {
            return {
                tasks: [],
                newTask: ''
            }
        },
        mounted() {
            axios.get(`/api/projects/${this.project}/tasks`).then(response => {
                this.tasks = response.data;
            });
            window.Echo.private('tasks.' + this.project).listen('TaskCreated', e => {
                this.tasks.push(e.task.body)
            })
        },
        methods:{
            addTask() {
                axios.post(`/api/projects/${this.project}/tasks`,{body:this.newTask});
                this.tasks.push(this.newTask);
                this.newTask = '';
            }
        }
    }
</script>
