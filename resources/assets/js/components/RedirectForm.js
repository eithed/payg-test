import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import RedirectItem from './RedirectItem';

export default class RedirectForm extends Component {
    constructor(props) {
        super(props);
        this.state = {url: '', list: []};

        this.handleChange = this.handleChange.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
    }

    handleChange(event) {
        this.setState({url: event.target.value});
    }

    handleSubmit(event) {
        event.preventDefault();

        axios.post('/', {url: this.state.url}).then((response) => {
            var list = this.state.list;
            list.push(response.data.short_url)

            this.setState({url: '', list: list});
        });
    }

    componentWillMount() {
        this.setState({list: JSON.parse(this.props.list)});
    }

    render() {
        var urls = this.state.list.map(function(url, index){
            return <li key={index}><RedirectItem url={url} /></li>
        })

        return (
            <form className="form-horizontal" onSubmit={this.handleSubmit}>
                <fieldset>
                    <legend>Redirect Form</legend>
                    <div className="form-group">
                        <label>Url:</label>
                        <input type="text" className="form-control" value={this.state.url} onChange={this.handleChange}/>
                    </div>
                    
                    
                    <button className="btn btn-primary" type="submit">Add Item</button>
                </fieldset>

                <hr/>

                <ul>{urls}</ul>
            </form>
        );
    }
}