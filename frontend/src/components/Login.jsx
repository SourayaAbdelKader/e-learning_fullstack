export default function LoginForm () {
  return <>
      <div id="loginform">
        <FormHeader title="Intelligence growth" />
        <Form />
      </div>
      </>
  }

const FormHeader = props => (
  <div>
      <img id="icon" src="brain.png" alt="logo"></img>
      <h2 id="headerTitle">{props.title}</h2>
  </div>
);


const Form = props => (
   <div>
     <FormInput description="Email" placeholder="Enter your email" type="text" />
     <FormInput description="Password" placeholder="Enter your password" type="password"/>
     <FormButton title="Log in"/>
   </div>
);

const FormButton = props => (
  <div id="button" class="row">
    <button>{props.title}</button>
  </div>
);

const FormInput = props => (
  <div class="row">
    <label>{props.description}</label>
    <input type={props.type} placeholder={props.placeholder}/>
  </div>  
);