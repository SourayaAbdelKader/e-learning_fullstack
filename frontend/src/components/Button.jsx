export default function Button ({txt, onclick}){
    return <>
        <button onClick={onclick} > {txt} </button>
    </>
}