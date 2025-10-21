import { useEffect, useState } from "react";
import { Button } from "primereact/button";
import { Carousel } from "primereact/carousel";
import axios from "axios";
import styles from "../styles/HomePage.module.css";

function Companies() {
  const apiUrl = process.env.REACT_APP_API_URL;
  const assetUrl = process.env.REACT_APP_ASSET_URL;
  const [companies, setCompanies] = useState([]);
  const responsiveOptions = [
    {
      breakpoint: "1400px",
      numVisible: 2,
      numScroll: 1,
    },
    {
      breakpoint: "1199px",
      numVisible: 3,
      numScroll: 1,
    },
    {
      breakpoint: "767px",
      numVisible: 2,
      numScroll: 1,
    },
    {
      breakpoint: "575px",
      numVisible: 1,
      numScroll: 1,
    },
  ];

  useEffect(() => {
    axios
      .get(`${apiUrl}/companies`)
      .then((response) => {
        setCompanies(response.data);
      })
      .catch((error) => {
        console.error("Error fetching companies:", error);
      });
  }, []);

  // console.log("COMAPANIES", companies);

  const companyTemplate = (company) => {
    return (
      <div
        className=" surface-border border-round m-2 text-center py-5 px-3"
        style={{
          height: "300px", // Fixed height for uniformity
        }}
      >
        <div className="mb-3">
          {company.logo ? (
            <img
              src={`${assetUrl}/${company.logo}`}
              alt={company.name}
              style={{
                maxHeight: "200px",
                maxWidth: "200px",
                objectFit: "contain",
              }}
            />
          ) : (
            <span
              style={{
                fontSize: "2rem",
                fontWeight: "bold",
                color: "lawngreen",
              }}
            >
              {company.name}
            </span>
          )}
        </div>
        <div>
          <div className="mt-5 flex flex-wrap gap-2 justify-content-center">
            <Button
              icon="pi pi-eye"
              className="p-button-success p-button-rounded"
              onClick={() => window.open(company.website, "_blank")}
            />
          </div>
        </div>
      </div>
    );
  };

  return (
    <div className={`card ${styles.clients_container}`}>
      <h2 className={styles.title}>I HAVE COLLABORATED WITH</h2>
      <Carousel
        value={companies}
        numVisible={3}
        numScroll={3}
        responsiveOptions={responsiveOptions}
        className="custom-carousel"
        circular
        autoplayInterval={3000}
        itemTemplate={companyTemplate}
        pt={{
          previousButton: {
            style: {
              width: "50px",
              height: "50px",
              backgroundColor: "lawngreen",
              border: "none",
            },
          },
          nextButton: {
            style: {
              width: "50px",
              height: "50px",
              backgroundColor: "lawngreen",
              border: "none",
            },
          },
          previousButtonIcon: {
            style: {
              color: "black",
            },
          },
          nextButtonIcon: {
            style: {
              color: "black",
            },
          },
          indicatorButton: ({ context }) => ({
            style: {
              backgroundColor: context.active ? "lawnGreen" : "#e0e0e0",
            },
          }),
        }}
      />
    </div>
  );
}

export default Companies;
