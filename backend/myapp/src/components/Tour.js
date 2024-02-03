

const Tour = () =>{

    let tourContainer = document.getElementById('tourism')
    let getTour = async () =>{
        let tours = await fetch('http://127.0.0.1:8000/api/tours/')
        let response =await tours.json()
        
        for (let i = 0 ; i < response.length; i++){
            let tour = response[i]
            let row = `<div>
                            <h3>${tour.title}</h3>
            </div>`
            
            tourContainer.innerHTML += row
        }
    }
    
    getTour()
 return (
    
    <div>
        <h1>My All Tours</h1>
        <div id="tourism">
           
        </div>
    </div>
 )

}

export default Tour