import React, {Component} from 'react';
import axios from 'axios';

interface PostsState {
    loading: boolean,
    posts: Array<any>
}

interface PostsProps {
};

class Posts extends React.Component<PostsProps, PostsState> {
    constructor(props:PostsProps) {
        super(props);

        this.state = { posts: [], loading: true}
    }

    componentDidMount() {
        this.getPosts();
    }

    getPosts() {
        axios.get(`http://localhost:8000/api/posts`).then(posts => {
            this.setState({ posts: posts.data, loading: false})
        })
    }

    render() {
        const loading = this.state.loading;
        return (
            <div>
                <section className="row-section">
                    <div className="container">
                        <div className="row">
                            <h2 className="text-center"><span>List of posts</span></h2>
                        </div>

                        {loading ? (
                            <div className={'row text-center'}>
                                <span className="fa fa-spin fa-spinner fa-4x"></span>
                            </div>

                        ) : (
                            <div className={'row'}>
                                {this.state.posts.map(post =>
                                    <div className="col-md-10 offset-md-1 row-block" key={post.id}>
                                        <ul id="sortable">
                                            <li>
                                                <div className="media">
                                                    <div className="media-body">
                                                        <h4>{post.title}</h4>
                                                        <p>{post.body}</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                )}
                            </div>
                        )}
                    </div>
                </section>
            </div>
        )
    }
}

export default Posts;