import React from 'react'
import Chart from './Chart'
import { useEffect, useState } from "react";

const Dashboard = () => {
    const [data, setdata] = useState();

    useEffect(() => {
        const fetchDatas = async () => {
        const res = await fetch("https://api.coincap.io/v2/assets/?limit=20");
        const data = await res.json();
        console.log(data);
        setdata(data?.data);
        };
        fetchDatas();
    }, []);

    return (
        <div className='dashboard'>
            <div className="card">
                <h3>Recharts Dashboard Widget</h3>
                <Chart data={data} />
            </div>
        </div>
     );
}

export default Dashboard;