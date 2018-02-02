import React, { Component } from 'react';
import './App.css';
import axios from 'axios';

class App extends Component {
	
	constructor(){
		super();
		this.state = {
			menu: []
		};
	}

	componentWillMount(){
		axios.get("http://localhost/_learn/wp-react/wordpress/wp-json/app/v1/menu")
        .then(res => {
        		console.log( res );
            this.setState({
                menu: res.data[0].menu_html, update: true
            })
        }); 
    // console.log(this.state.menu)
	}
  render() {
  	const renderHTML = (rawHTML: string) => React.createElement("div", { dangerouslySetInnerHTML: { __html: rawHTML } });

    return (
      <div className="container">
        <div className="row">
        	{ renderHTML(this.state.menu) }
        </div>
      </div>
    );
  }
}

export default App;
