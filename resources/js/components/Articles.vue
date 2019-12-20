<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 text-center">
                <h2>Articles Component</h2>

                <form @submit.prevent="saveArticle()">
                    <div class="form-group">
                        <input id="input_title" v-model="article.title" type="text" class="form-control" placeholder=" T i t l e">
                    </div>
                    <div class="form-group">
                        <textarea v-model="article.text" class="form-control" placeholder=" T e x t "></textarea>
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-sm btn-outline-dark"> Save </button>
                    </div>
                </form>

                <div v-infinite-scroll="loadMore" infinite-scroll-disabled="busy" infinite-scroll-distance="10">
                    <div class="card card-body mb-4" v-for="article in articles" v-bind:key="article.id"
                         data-aos="fade-up" data-aos-offset="200" data-aos-easing="ease-out-back">
                        <small style="position: absolute; top: 3px; right: 3px">{{ article.id }}</small>
                        <h3>{{ article.title }}</h3>
                        <p>{{ article.text }}</p>
                        <hr />
                        <div class="row">
                            <div class="col-12 text-right">
                                <button @click="editArticle(article)" class="btn btn-sm btn-outline-success">Edit</button>
                                <button @click="deleteArticle(article.id)" class="btn btn-sm btn-outline-danger">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import AOS from 'aos';
import 'aos/dist/aos.css';

AOS.init();

export default {
    data() {
        return {
            articles : [],
            article : {
                id : '',
                title : '',
                text : ''
            },
            article_id : '',
            pagination : {},
            edit : false,
            limit: 3,
            busy: false,
        };
    },

    created() {
        this.loadMore();
        Echo.channel('feed')
            .listen('AddArticleSpaEvent', (e) => {
                this.reloadArticles();
            });
    },

    methods : {
        // Infinite Scroll
        loadMore: function() {
            this.busy = true;
            axios.get("api/articles")
                .then(response => {
                    const append = response.data.data.slice(
                    this.articles.length,
                    this.articles.length + this.limit
                );
                this.articles = this.articles.concat(append);
                this.busy = false;
            });
        },

        saveArticle() {
            if(this.edit === true)
                this.updateArticle();
            else
                this.storeArticle();
        },

        editArticle(article) {
            this.edit = true;
            this.article.id = article.id;
            this.article.article_id = article.id;
            this.article.title = article.title;
            this.article.text = article.text;
            document.getElementById('input_title').focus();
        },

        storeArticle() {
            axios.post(
                'api/articles',
                { title : this.article.title, text : this.article.text }
                )
                .then((response) => {
                    this.article.title = '';
                    this.article.text = '';
                }).catch(err => console.log(err));
        },

        updateArticle() {
            axios.put(
                'api/articles/' + this.article.id,
                { title : this.article.title, text : this.article.text }
                )
                .then((response) => {
                    this.article.title = '';
                    this.article.text = '';
                    alert('Article Updated');
                    this.reloadArticles();
                }).catch(err => console.log(err));
        },

        deleteArticle(id) {
            if(confirm('Are you sure?')) {
                axios.delete(
                    'api/articles/' + id,
                )
                .then((response) => {
                    this.article.title = '';
                    this.article.body = '';
                    alert('Article Deleted');
                    this.reloadArticles();
                }).catch(err => console.log(err));
            }

        },

        reloadArticles() {
            axios.get('api/articles?reload=true')
                .then(response => {
                    this.articles = [];
                    setTimeout(
                        () => {
                            this.articles = response.data.data
                        },
                        500
                    );
                })
                .catch(err => console.log(err));
        },
    }
};

</script>















