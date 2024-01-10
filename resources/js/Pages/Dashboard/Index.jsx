import React, { useEffect, useRef } from "react"
import { Head } from "@inertiajs/react"
import Sidebar from "./Layout/Sidebar"
import { Helmet } from "react-helmet"

// export default class Index extends React.Component {
//     constructor () {
//         super()
//         this.ref = useRef(null)

//         useEffect(() => {
//             if (this.ref.offsetHeight < screen.height) {
//                 this.ref.classList.add("h-screen")
//             } else {
//                 this.ref.classList.remove("h-screen")
//             }
//         })
//     }
//     render () {
//         return (
//             <>
//             <Head title="Dashboard" />
//             <main ref={this.ref}>
//                 <Sidebar className="w-1/5 h-full border-r" />
//             </main>
//             </>
//         )
//     }
// }

function index() {
    // const ref = useRef(null).current

    // useEffect(() => {
    //     if (ref.offsetHeight < screen.height) {
    //         ref.classList.add("h-screen")
    //     } else {
    //         ref.classList.remove("h-screen")
    //     }
    // })

    return (
        <>
        <Head title="Dashboard" />
        <main className="h-full">
            <Sidebar className="w-1/5 h-full border-r" />
        </main>
        </>
    )
}

export default index;