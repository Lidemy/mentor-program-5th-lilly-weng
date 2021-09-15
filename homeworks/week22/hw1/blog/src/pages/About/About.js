import React from "react";
import styled from "styled-components";

const AboutMeWrapper = styled.div`
  margin-top: 64px;
`;
const AboutMeBox = styled.div`
  display: flex;
  width: 600px;
  height: 233px;
`;
const AboutMeContentWrapper = styled.div`
  width: 400px;
  padding: 16px 0;
  margin: 0 16px;
  border-bottom: 1px solid rgba(0, 0, 0, 0.3);
`;
const AboutMeTitle = styled.div`
  color: #5b5b5b;
  font-size: 28px;
  font-weight: bold;
  padding-bottom: 24px;
`;
const AboutMeContent = styled.div`
  color: #5b5b5b;
  font-size: 16px;
`;
const AboutMeAvatar = styled.div`
  width: 200px;
  height: 200px;
  background-color: black;
  padding: 16px;
  border-radius: 5px 20px 5px;
  background: #bada55;
`;
export default function AboutPage() {
  return (
    <AboutMeWrapper>
      <AboutMeBox>
        <AboutMeContentWrapper>
          <AboutMeTitle>Lilly Weng</AboutMeTitle>
          <AboutMeContent>不想坐以待斃，所以轉碼</AboutMeContent>
        </AboutMeContentWrapper>
        <AboutMeAvatar />
      </AboutMeBox>
    </AboutMeWrapper>
  );
}
